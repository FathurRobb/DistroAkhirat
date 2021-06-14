<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GudanginsController extends Controller
{
    public function index(){
        $gin = DB::table('gudangins')->get();
        $gdtl = DB::table('gudangin_details')->get();

        $data = [
                "gudangin" => $gin,
                "gudangin_details" => $gdtl
                ];
        return view('Gudang.in.gin',$data);
    }
}
