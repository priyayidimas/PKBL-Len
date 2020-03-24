<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Auth;
use Redirect;
use Session;
use DB;
class LoginController extends Controller
{
    public function login()
    {
      $email = Input::get('email');
      $pass = Input::get('password');
      if (Auth::attempt(['email' => $email, 'password' => $pass])){
        return Redirect::to('/admin');
      }else {
        return Redirect::to('/login')->with(['color' => 'red', 'msg' => 'Username Atau Password Salah']);
      }
    }
    public function updatePass()
    {
      $pass = Input::get('baru');
      $lama = DB::table('users')->where('id','=',Auth::user()->id)->first()->password;
      if (!Hash::check(Input::get('lama'),$lama) ) {
        return Redirect::to('/admin')->with(['color' => 'red', 'msg' => 'Password Lama Salah']);        
      }elseif(Input::get('cbaru') != $pass){
        return Redirect::to('/admin')->with(['color' => 'red', 'msg' => 'Password Baru dan Confirm Password Tidak Cocok']);        
      } else {
        DB::table('users')->where('id','=',Auth::user()->id)->update(['password' => bcrypt($pass)]);
        return Redirect::to('/admin')->with(['color' => 'green', 'msg' => 'Password Berhasil Diubah']);                
      }
      
    }
    function logout()
    {
      Session::flush();
      Auth::logout();
      return Redirect::to('/');
    }
}
