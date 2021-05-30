<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;

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
        }
        return redirect('/')->with('error','Cek Username dan Password Anda');
    }
    public function logout(){
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }elseif (Auth::guard('kasir')->check()) {
            Auth::guard('kasir')->logout();
        }elseif (Auth::guard('gudang')->check()) {
            Auth::guard('gudang')->logout();
        }
        return redirect('/')->with('sukses','Anda Telah Logout');
    }
}
