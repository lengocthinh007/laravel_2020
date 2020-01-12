<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\cates;
use App\Models\products;
class Frontendcontroller extends Controller
{
     public function  __construct(){
    	$menu = cates::all();
    	View::share('menu',$menu);
    }
       public function getloaisanpham($id){
    	$products = products::where([
    		'cate_id'=> $id,
    		'pro_active'=> products::STATUS_PUBLIC
    	])->orderBy('id','DESC')->paginate(10);
    	$cate = cates::select('name')->find($id);
    	$viewdata = [
    		'products'=>$products,
    		'cate'=>$cate
    	];
    	return view ('frontend.loaisanpham',$viewdata);
    }
     public function getdetails($id){
    	$products = products::where(
    		'pro_active', products::STATUS_PUBLIC
    	)->find($id);
    	$viewdata = [
    		'products'=>$products,
    	];
    	return view ('frontend.Details',$viewdata);
    }
}
