<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use Validator;

class LoginController extends Controller
{
    public function halamanlogin(){
        return view('login');
    }
    public function postlogin(Request $request){        
        if(Auth::attempt($request->only('username','password'))){
            $akun = DB::table('users')->where('username', $request->username)->first();
            if ($akun->level == 'admin') {
                Auth::guard('admin')->LoginUsingId($akun->id);
                return redirect('/admin')->with('sukses','Anda Berhasil Login');
            }elseif ($akun->level == 'kasir') {
                Auth::guard('kasir')->LoginUsingId($akun->id);
                return redirect('/kasir')->with('sukses','Anda Berhasil Login');
            }elseif ($akun->level == 'gudang') {
                Auth::guard('gudang')->LoginUsingId($akun->id);
                return redirect('/gudang')->with('sukses','Anda Berhasil Login');
            }
        }else {
            return view('login')->with('error','Username Atau Password Anda Salah');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/')->with('sukses','Anda Telah Logout');
    }
}
