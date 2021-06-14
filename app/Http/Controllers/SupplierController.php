<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SupplierController extends Controller
{
    public function index(){
        $supplier = DB::table('suppliers')->get();

        $data = [
                //"gudang" => $gudang,
                "supplier" => $supplier
                ];
        return view('Gudang.Supplier.supplier',$data);
    }
}
