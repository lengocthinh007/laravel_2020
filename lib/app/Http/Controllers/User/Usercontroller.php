<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\User;
use App\Http\Requests\requestPassword;
use Hash;

class Usercontroller extends Controller
{
      public function home()
      {
      	$Transaction = Transaction::where('user_id',get_data_user('web'));
      	$listtransaction=$Transaction;
      	$Transaction=$Transaction->addselect('id','total','address','phone','created_at','status')->paginate(10);
      	$totaltransaction =$listtransaction->select('id')->count();
      	$totaltransactiondone =$listtransaction->where('status',Transaction::STATUS_DONE)->select('id')->count();

      	$viewdata=[
      		'Transaction'=> $Transaction,
      		'totaltransaction'=>$totaltransaction,
      		'totaltransactiondone'=>$totaltransactiondone
      	];

      	return view('User.home',$viewdata);
      }

      public function getinfor()
      {
      	$data = User::find(get_data_user('web'))->toArray();
      	return view('User.infor',compact('data'));
      }

      public function saveinfor(Request $request)
      {
      	$user=User::where('id',get_data_user('web'))->update($request->except('_token'));
      	return redirect()->back()->with(['level'=>'success','message'=>'Cập nhật thành công']);
      }

      public function updatepassword()
      {
      	return view('User.updatepassword');
      }

      public function savepassword(requestPassword $requestPassword)
      {
      	if(Hash::check($requestPassword->Password_old,get_data_user('web','password')))
      	{
      		$user=User::find(get_data_user('web'));
      		$user->password=bcrypt($requestPassword->Password);
      		$user->save();
      		return redirect()->back()->with(['level'=>'success','message'=>'Cập nhật thành công']);
      	}
      	return redirect()->back()->with(['level'=>'danger','message'=>'Mật khẩu cũ không đúng']);
      }
}
