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

        return view('swab.hasil', compact('data','qrcode'));
    }
}
