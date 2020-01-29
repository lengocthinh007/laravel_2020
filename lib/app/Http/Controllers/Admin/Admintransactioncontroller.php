<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\products;
use DB;

class Admintransactioncontroller extends Controller
{
     public function index(){
    	$Transaction = Transaction::with('user:id,name')->paginate(10);
    	
    	$viewdata = [
    		'transaction' => $Transaction
    	];
    	return view ('Backend.transaction.list',$viewdata);
    }
     public function vieworder(Request $request,$id){
    	if($request->ajax())
    	{
    		$orders = Order::with('products')->where('transaction_id',$id)->get();
    		$html = view('Backend.components.order',compact('orders'))->render();
    		return response()->json($html);
    	}
    }
      public function activetransaction($id){
        $Transaction = Transaction::find($id);
        $order = Order::where('transaction_id',$id)->get();

        if($order)
        {
            foreach ($order as $item) {
                $product = products::find($item->product_id);
                $product->pro_number =  $product->pro_number - $item->qty;
                $product->pro_pay ++;
                $product->save();
            }
        }
        DB::table('users')->where('id',$Transaction->user_id)->increment('total_pay');
        $Transaction->status = Transaction::STATUS_DONE;
        $Transaction->save();
        return redirect()->back()->with(['level'=>'success','message'=>'Xử lí thành công']);
    }
}
