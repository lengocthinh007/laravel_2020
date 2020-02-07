<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\requestPassword;
use App\User;
use Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    public function formlaylaipass()
      {
        return view('Backend.Auth.emaillaypass');
      }

    public function sendcodelaylaipass(Request $request)
      {
        $email = $request->email;
        $checkUser= User::where('email',$email)->first();
        if(!$checkUser)
        {
            return redirect()->back()->with(['level'=>'danger','message'=>'Email không tồn tại']);
        }
        $code=bcrypt(md5(time().$email));
        $checkUser->code=$code;
        $checkUser->time_code = Carbon::now();
        $checkUser->save();

        $url = route('get.link.reset.password',['code'=>$checkUser->code,'email'=>$email]);

        $data=[
            'route'=>$url,
        ];

        // Mail::send('Auth.pageinmail', $data, function($message) use ($email){
        //     $message->to(' $email', 'Reset Password')->subject('Lấy Lại Mật Khẩu!');
        // });

        Mail::send('Backend.Auth.pageinmail', $data, function ($message) use ($email) {
                 $message->from('lengocthinh006@gmail.com', 'Thinhpro');
                 $message->to($email,$email);
                 $message->subject('Lấy Lại Mật Khẩu!');
                 });

         return redirect()->back()->with(['level'=>'success','message'=>'Link lấy lại mật khẩu đã được gửi vào email của bạn']);
        
      }

     public function resetpassword(Request $request)
      {
            $code = $request->code;
            $email = $request->email;
            $checkUser= User::where('email',$email)->first();
            if(!$checkUser)
            {
                return redirect()->back()->with(['level'=>'danger','message'=>'Email không tồn tại']);
            }
        return view('Backend.Auth.passwordreset');
      }

      public function saveresetpassword(requestPassword $requestPassword)
      {
        if($requestPassword->Password)
        {
            $code = $requestPassword->code;
            $email = $requestPassword->email;
            $checkUser= User::where('email',$email)->first();
            if(!$checkUser)
            {
                return redirect()->back()->with(['level'=>'danger','message'=>'Email không tồn tại']);
            }
            $checkUser->password=bcrypt($requestPassword->Password);
            $checkUser->save();
            return redirect()->route('dang-nhap')->with(['level'=>'success','message'=>'Lấy lại mật khẩu thành công']);
            }
      }

    use SendsPasswordResetEmails;
}
