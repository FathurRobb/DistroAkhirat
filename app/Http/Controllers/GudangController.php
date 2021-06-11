<?php

namespace App\Http\Controllers;

use App\Models\gudang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GudangController extends Controller
{
    public function index(){
        $gudang = DB::table('gudangs')->get();
        return view('Gudang.dashboard',['gudang' => $gudang]);
    }
    public function search(){
        // $gudang =
        // return view('Gudang.dashboard',['gudang'=>$gudang]);
    }

    public function read(){
        $gudang = DB::table('users')->get();

    }

    public function read_in(){

    }
    public function read_out(){

    }

    public function store(Request $request){
        DB::table('gudangs')->insert([
            'kode_brg'=> $request->kode_brg,
            'jenis'=>$request->jenis,
            'nm_brg'=> $request->nm_brg,
            'warna'=>$request->warna,
            'ukuran'=>$request->ukuran,
            'stok_brg'=>$request->stok,
            'harga_beli_brg'=>$request->harga_beli,
            'harga_jual_brg'=>$request->harga_jual,
            'detail'=>$request->detail
            ]);
            //return redirect('');
    }

    public function store_io(){

    }

    public function update(){



    }
    public function delete(){

    }
}
