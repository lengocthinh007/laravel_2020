<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\products;
use Carbon\Carbon;

class Ratingcontroller extends Controller
{
      public function saverating(Request $request,$id){
      	if($request->ajax())
      	{
      		Rating::insert([
      			'product_id' => $id,
      			'number' => $request->number,
      			'content' => $request->content,
      			'user_id' => get_data_user('web'),
      			'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
      		]);
      		$products = products::find($id);
      		$products->pro_total_number += $request->number; 
      		$products->pro_total_rating += 1; 
      		$products->save();
      		 // return response()->json(['code'=>'1']);
      		 return "OK";
      	}
    	
    }
}
