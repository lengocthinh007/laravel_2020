<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class USercontroller extends Controller
{
     public function index(){
    	$user = User::whereraw(1);
    	$user = $user->orderBy('id','DESC')->paginate(10);
    	$viewdata = [
    		'user'=>$user
    	];
    	return view ('Backend.user.list',$viewdata);
    }
}
