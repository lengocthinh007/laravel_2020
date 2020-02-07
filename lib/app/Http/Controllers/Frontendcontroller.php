<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\cates;
use App\Models\products;
use App\Models\Rating;
use DB;
class Frontendcontroller extends Controller
{
     public function  __construct(){
    	$menu = cates::all();
    	View::share('menu',$menu);
    }
       public function getloaisanpham(Request $request)
    {
        $id = \Request::segment(2);
        $products = products::where('pro_active',products::STATUS_PUBLIC);
        $cateproduct=[];
        $key='';
        if($id)
        {
            $cateproduct = cates::select('name')->find($id);
            $products = products::where([
                'cate_id'=> $id,
            ]);
        }

        if($request->k)
        {
            $key=$request->k;
            $products->where('name','like','%'.$request->k.'%');
        }
       
        if($request->price)
        {
            $price=$request->price;
            switch ($price) {
                case 1:
                    $products->where('price','<',1000000);
                    break;
                case 2:
                    $products->whereBetween('price',[1000000,3000000]);
                    break;
                case 3:
                    $products->whereBetween('price',[3000000,5000000]);
                    break;
                case 4:
                    $products->whereBetween('price',[5000000,7000000]);
                    break;
                case 5:
                    $products->whereBetween('price',[7000000,10000000]);
                    break;
                case 6:
                    $products->where('price','>',10000000);
                    break;
                
            }
        }
        if($request->orderby)
        {
            $orderby=$request->orderby;
            switch ($orderby) {
                case 'desc':
                    $products->orderBy('id','DESC');
                    break;
                case 'asc':
                    $products->orderBy('id','ASC');
                    break;
                case 'price_max':
                    $products->orderBy('price','ASC');
                    break;
                case 'price_min':
                    $products->orderBy('price','DESC');
                    break;
                default:
                   $products->orderBy('id','DESC');
                    break;
            }
        }

        $products=$products->paginate(1);

    	$cate = cates::select('name')->find($id);
    	$viewdata = [
            'cateproduct'=>$cateproduct,
    		'products'=>$products,
    		'cate'=>$cate,
            'query'=>$request->query(),
            'key'=>$key
    	];

    	return view ('frontend.loaisanpham',$viewdata);
    }
     public function getdetails($id){
    	$products = products::where(
    		'pro_active', products::STATUS_PUBLIC
    	)->find($id);

        $listrating = Rating::with('user:id,name')
        ->where('product_id',$id)->orderBy('id','DESC')->paginate(10);

        $rating = Rating::groupBy('number')
        ->where('product_id',$id)
        ->select(DB::raw('count(number) as total'),DB::raw('sum(number) as sum'))
        ->addSelect('number')
        ->get()->toArray();
        $arrayrating = [];
        if(!empty($rating))
        {
            for($i=1;$i<=5;$i++)
            {
                $arrayrating[$i]=[
                    'total' => 0,
                    'sum' => 0,
                    'number' => 0                
                ];
                foreach($rating as $item) {
                    if($item['number']==$i)
                    {
                        $arrayrating[$i]=$item;
                        continue;
                    }
                }
            }
        }
        
    	$viewdata = [
    		'products'=>$products,
            'arrayrating'=>$arrayrating,
            'listrating' => $listrating,
    	];
    	return view ('frontend.Details',$viewdata);
    }
}
