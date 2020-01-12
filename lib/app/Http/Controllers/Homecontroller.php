<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\Models\products;

class Homecontroller extends Frontendcontroller
{
    public function _construct(){
    	parent:: __construct();
    }
    public function getHome(){
    	$products = products::where([
    		'pro_hot'=> products::HOT_ON,
    		'pro_active'=> products::STATUS_PUBLIC
    	])->limit(5)->get();
    	$viewdata = [
    		'products'=>$products
    	];
    	return view ('frontend.Home',$viewdata);
    }
}
