<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mstproduct;
use App\Syscompany;
use DB;
use App\Trnblog;
use App\Mstproductcategory;

class PackageController extends Controller
{
    //
    public function index()
    {
        $products = Mstproduct::join('mst_currency', 'mst_product.currency_id', '=', 'mst_currency.id')->select('mst_product.*',DB::raw('mst_currency.code as currency_code'))->orderBy('mst_product.rating','desc')->orderBy('mst_product.price','desc')->get();
        $company = Syscompany::first();
        $latest_post = Trnblog::orderBy("created_at","desc")->limit(2)->get();
        $product_categories = Mstproductcategory::orderBy("rating","desc")->get();
        
        return view('pages.packages', compact('products','company','latest_post','product_categories'));
    }

    public function get_by_parameters(Request $request)
    {
        $products = Mstproduct::join("mst_currency","mst_product.currency_id","=","mst_currency.id")
        ->select("mst_product.*",DB::raw("mst_currency.code as currency_code"));
        foreach($request->except('_token') as $k=>$v){
            if (!empty($v)) {
                $products = $products->where($k, $v);
            }
        }
        $products = $products->get();
        $company = Syscompany::first();
        $latest_post = Trnblog::orderBy("created_at","desc")->limit(2)->get();
        $product_categories = Mstproductcategory::orderBy("rating","desc")->get();
        session()->flashInput($request->input());
        return view('pages.packages', compact('products','company','latest_post','product_categories'));
    }
}
