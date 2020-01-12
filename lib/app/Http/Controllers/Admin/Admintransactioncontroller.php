<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Admintransactioncontroller extends Controller
{
     public function index(){
    	
    	return view ('Backend.transaction.list');
    }
}
