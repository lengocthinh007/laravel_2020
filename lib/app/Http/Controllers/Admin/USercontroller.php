<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Transaction;
use App\Models\products;
use App\Models\cates;

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

     public function tongquang(){
        $moneyDay = Transaction::whereDay('updated_at',date('d'))
        ->where('status',Transaction::STATUS_DONE)
        ->sum('total');

        $moneyMonth = Transaction::whereMonth('updated_at',date('m'))
        ->where('status',Transaction::STATUS_DONE)
        ->sum('total');

         $moneyYear = Transaction::whereYear('updated_at',date('Y'))
        ->where('status',Transaction::STATUS_DONE)
        ->sum('total');

        $datamoney = [
            [
                'name'=>'Doanh thu ngày',
                'y'=> (int)$moneyDay,
                'drilldown' => 'Doanh thu ngày'
            ],
            [
                'name'=>'Doanh thu tháng',
                'y'=> (int)$moneyMonth,
                'drilldown' => 'Doanh thu tháng'
            ],
            [
                'name'=>'Doanh thu năm',
                'y'=> (int)$moneyYear,
                'drilldown' => 'Doanh thu năm'
            ]
        ];
        $viewdata=[
            'datamoney'=>json_encode($datamoney)
        ];
       return view ('Backend.Tongquang',$viewdata);
    }

       public function kho(Request $request){
        $data = products::select('id','name','price','cate_id','pro_total_rating','pro_total_number','created_at','pro_active','pro_hot','pro_sale','image','pro_number');
        $colum='id';

        if($request->type && $request->type=='pay')
        {
            $colum='pro_pay';
            $data->where('pro_pay','>',0);
        }

        $cate = cates::select('id','name','parent_id')->get()->toArray();
         if($request->name)
         {
            $data = $data->where('name','like','%'.$request->name.'%');
         }
          if($request->cate)
         {
            $data = $data->where('cate_id',$request->cate);
         }
         $data = $data->orderBy($colum,'DESC')->get();
        return view('backend.kho',compact('data','cate'));
    }
}
