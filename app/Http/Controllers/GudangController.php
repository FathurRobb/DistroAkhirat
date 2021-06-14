<?php

namespace App\Http\Controllers;

use App\Models\gudang;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class GudangController extends Controller
{
    // public function __construct()
    // {
    //     $this->baran
    // }
    public function index(){
        $gudang = DB::table('gudangs')->get();
        $jenis = DB::table('jenis')->get();

        $data = [
                "gudang" => $gudang,
                "jenis" => $jenis
                ];
        return view('Gudang.dashboard',$data);
    }
    public function editBrg($id){
        $gudang = DB::table('gudangs')->where('id',$id)->get();
        $jenis = DB::table('jenis')->get();
        $data = ['gudang' => $gudang];
        return redirect('/gudang');
    }
    public function search(){
        // $gudang =
        // return view('Gudang.dashboard',['gudang'=>$gudang]);
    }

    public function saveBrg(Request $request){
        $data = [
            'kode_brg' => $request->input('kode_brg'),
            'nm_brg' => $request->input('nama'),
            'warna' => $request->input('warna'),
            'jenis' => $request->input('jenis_brg'),
            'ukuran' => $request->input('ukuran'),
            'stok_brg' => $request->input('stok_brg'),
            'hrg_beli' => $request->input('hrg_beli'),
            'hrg_jual' => $request->input('hrg_jual'),
            'detail' => $request->input('detail')
        ];

        DB::table('gudangs')->insert([$data]);
            return redirect('/gudang');
    }

    public function update(){

    }
    public function delete(){

    }
}
