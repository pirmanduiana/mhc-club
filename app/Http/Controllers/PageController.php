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
        return view('web.page.home');
    }

    public function page($page = "")
    {
    	$template = 'web.page.'.$page;
        
        
        if(view()->exists($template)){
		    return view('/'.$template);
		}else{
			abort('404');
		}
    }

    
}
