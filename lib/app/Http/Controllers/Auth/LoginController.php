<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

   

   
     
    public function getlogin()
    {
        return view('Backend.Auth.login');
    }
        public function postLogin(Request $request){
        $arr = ['email'=>$request->email,'password'=>$request->password];
        if($request->remember='Remember Me'){
            $remember=true;
        }
        else{
            $remember=false;
        }
        if(Auth::attempt($arr,$remember)){
            return redirect()->intended('/');
        }else{
            return back()->withInput()->with('message','Tài khoản hoặc mật khẩu không đúng');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->intended('/');
    }
}
