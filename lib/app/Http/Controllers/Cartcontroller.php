<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use Cart;
use App\Models\Transaction;
use App\Models\Order;
use Carbon\Carbon;

class Cartcontroller extends Controller
{
     public function thanhtoan()
      {
        $data['total'] = Cart::total();
        $data['items'] = Cart::content();
        return view('frontend.thanhtoan',$data);
      }

       public function savethanhtoan(Request $request)
     {
        $totalMoney = str_replace(',','',Cart::subtotal(0,3));
        $TransactionID = Transaction::insertGetId([
          'user_id' => get_data_user('web'),
          'total' => (int)$totalMoney,
          'note' => $request->note,
          'address' => $request->address,
          'phone' => $request->phone_number,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ]);
        if($TransactionID)
        {
            $products = Cart::content();
            foreach ($products as $product) 
              {
              Order::insert([
                'transaction_id'=>$TransactionID,
                'product_id'=>$product->id,
                'qty'=>$product->qty,
                'price'=>$product->options->price_old,
                'sale'=>$product->options->sale,
                ]);
              }
          }
        Cart::destroy();
        return redirect('/');
      }

     public function getcart($id) // Add Cart
    {
        $product = products::select('name','id','price','pro_sale','image','pro_number')->find($id);
        $price=$product->price;
        if($product->pro_sale)
        {
          $price=$price * (100 - $product->pro_sale)/100;
        }

        if($product->pro_number==0)
        {
           return redirect()->back()->with(['level'=>'danger','message'=>'Sản phẩm tạm hết hàng']);
        }

        if(!$product) return redirect('/');
        Cart::add([
          'id' => $id,
          'name' => $product->name,
          'qty' => 1,
          'price' => $price,
          'weight' => 550,
          'options' => [
              'img' => $product->image,
              'sale'=>$product->pro_sale,
              'price_old'=>$product->price
                      ]
        ]);
        return redirect('cart/show');
    }
     public function getshow()  // Show Cart
      {
      	$data['total'] = Cart::total();
      	$data['items'] = Cart::content();
      	return view('frontend.cart',$data);
      }

       public function getdelete($id)
       {
          if($id=='all')
          {
            Cart::destroy();
          }
          else
          {
            Cart::remove($id);
          }
          return back();
       }
}
