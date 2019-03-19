<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Syscompany;

class PageController extends Controller
{
    //
    public function index()
    {
        // $company = Syscompany::first();
        $page = '';
        return view('web.page.home',compact('page'));
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
