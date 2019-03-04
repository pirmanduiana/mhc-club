<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mstproduct;
use App\Trntestimonial;
use DB;
use App\Syscompany;
use App\Mstcustomer;
use App\Trnbooking;
use Mail;
use App\Mail\Productbooking;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Trnblog;
use App\Mstproductcategory;

class BookingController extends Controller
{
    //
    public function index()
    {
        $products = Mstproduct::join('mst_currency', 'mst_product.currency_id', '=', 'mst_currency.id')->select('mst_product.*',DB::raw('mst_currency.code as currency_code'))->orderBy('mst_product.rating','desc')->orderBy(DB::raw('mst_product.price * mst_currency.exc_rate'),'desc')->limit(6)->get();
        $testimonies = Trntestimonial::all();
        $company = Syscompany::first();
        $latest_post = Trnblog::orderBy("created_at","desc")->limit(2)->get();
        $product_categories = Mstproductcategory::orderBy("rating","desc")->get();
        
        return view('pages.booking', compact('products','testimonies','company','latest_post','product_categories'));
    }

    private function booking_validate_store(Request $request)
    {
        return $this->validate($request, [
            'booking_date' => 'required|date',
            'email' => 'required',
            'full_name' => 'required',
            'notes' => 'required',
            'country_code' => 'required',
            'pax' => 'required',
            'phone' => 'required',
            'g-recaptcha-response' => 'required|recaptcha'
        ]);
    }
    
    private function random()
    {        
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        $string = str_shuffle($pin);

        return $string;
    }

    public function get_booking_form($product_id)
    {
        $client = new Client([
            'base_uri' => 'https://restcountries.eu/rest/v2/'
        ]);
        $response = $client->request('GET', 'all');
        $response = json_decode($response->getBody(), true);
        $countries = [];
        foreach($response as $k=>$v){
            $countries[$v["alpha2Code"]] = $v["name"];
        }

        return view('pages.includes.booking_form', compact('countries'));
    }

    public function post_booking_form(Request $request)
    {
        $this->booking_validate_store($request);
        // store mst_customer
        $store_customer = Mstcustomer::create([
            "full_name"=>$request->full_name, "country_code"=>$request->country_code,
            "email"=>$request->email, "phone"=>$request->phone
        ]);
        if (!empty($store_customer)) {
            // store trn_booking
            $store_booking = Trnbooking::create([
                "customer_id"=>$store_customer->id,
                "product_id"=>$request->product_id,
                "booking_code"=>$this->random(),
                "booking_date"=>$request->booking_date,
                "pax"=>$request->pax,
                "notes"=>$request->notes
            ]);
            $rsv_email = Syscompany::first()->main_email;
            if (!empty($store_booking)) {
                Mail::to($request->email)
                ->bcc($rsv_email)
                ->send(new Productbooking($request));
                return response()->json($store_booking);
            }
        }
        return response()->json(["error"]);
    }

}
