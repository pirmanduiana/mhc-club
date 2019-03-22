<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Syscompany;
use App\Mstclient;
use App\Mstprovider;


class PageController extends Controller
{
    //
    public function index()
    {
        // $company = Syscompany::first();
        $client = Mstclient::all()->count();
        $provider = Mstprovider::all()->count();
        $page = '';
        return view('web.page.home',compact('page','client','provider'));
    }

    public function page($page = "")
    {
        $template = 'web.page.'.$page;
        if(view()->exists($template)){
		    return view('/'.$template, compact('page'));
		}else{
			abort('404');
		}
    }

    
}
