<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Syscompany;
use App\Mstproduct;
use App\Mstproductcategory;
use App\Trnblog;

class PageController extends Controller
{
    //
    public function index()
    {
        $company = Syscompany::first();
        return view('index',compact('company'));
    }

    public function about_page()
    {        
        $company = Syscompany::first();
        $latest_post = Trnblog::orderBy("created_at","desc")->limit(2)->get();
        $product_categories = Mstproductcategory::orderBy("rating","desc")->get();
        
        return view('pages.aboutus', compact('company','latest_post','product_categories'));
    }

    public function product_page($product_id)
    {
        $company = Syscompany::first();
        $product = Mstproduct::where('mst_product.id',$product_id)->join('mst_currency','mst_currency.id','=','mst_product.currency_id')->join('mst_product_category','mst_product_category.id','=','mst_product.category_id')->select('mst_product.*', DB::raw('mst_currency.code as currency_code'), DB::raw('mst_product_category.name as category_name'))->first();
        $latest_post = Trnblog::orderBy("created_at","desc")->limit(2)->get();
        $related_product_of_same_category = Mstproduct::where("category_id",$product->category_id)->orderBy(DB::raw('rand()'))->limit(5)->get();
        $product_categories = Mstproductcategory::orderBy("rating","desc")->get();

        return view('pages.product', compact('company','product','related_product_of_same_category','latest_post','product_categories'));
    }
}
