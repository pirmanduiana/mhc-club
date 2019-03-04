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
        $company = Syscompany::first();
        return view('index',compact('company'));
    }
    
}
