<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

   
    public function getregister()
    {
        return view('backend.auth.register');
    }
    public function postregister(Request $request)
    {
        $user = new User();
        $user->name = $request->Name;
        $user->email = $request->Email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->Password);
        $user->save();
        if($user->id){
            return redirect()->intended('dang-nhap');
        }
            return redirect()->back();
    }
}
