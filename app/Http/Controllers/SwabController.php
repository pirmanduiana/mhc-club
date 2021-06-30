<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Swabs;

class SwabController extends Controller
{
    public function getHasilSwab($no_identitas)
    {
        $data = Swabs::where('no_identitas', $no_identitas)->with('dokter','kelamin','hasil')->first();
        $qrcode = "https://mhc-club.com/swab/$data->no_identitas";
        $ispdf = 0;
        $show_tools_button = 0;

        return view('swab.hasil', compact('data','qrcode','ispdf','show_tools_button'));
    }
}
