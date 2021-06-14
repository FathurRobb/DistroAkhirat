<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class JenisController extends Controller
{
    public function index(){
        $jenis = DB::table('jenis')->get();

        $data = [
                "jenis" => $jenis
                ];
        return view('Gudang.Jenis.jenis',$data);
    }
}
