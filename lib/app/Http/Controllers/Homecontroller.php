<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
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

     public function recentlyviews(Request $request)
    {
        if($request->ajax())
        {
            $listid=$request->id;
            $products = products::whereIn('id',$listid)->get();
            $html = view('Backend.components.recently_views',compact('products'))->render();
            return response()->json(['data'=>$html]);
        }
    }
}
