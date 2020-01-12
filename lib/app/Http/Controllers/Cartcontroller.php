<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use Cart;

class Cartcontroller extends Controller
{
     public function getcart($id)
    {
        $product = products::select('name','id','price','image')->find($id);
        if(!$product) return redirect('/');
        Cart::add(['id' => $id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'weight' => 550, 'options' => ['img' => $product->image]]);
        return redirect('cart/show');
    }
     public function getshow(){
      	$data['total'] = Cart::total();
      	$data['items'] = Cart::content();
      	return view('frontend.cart',$data);
      }
}
