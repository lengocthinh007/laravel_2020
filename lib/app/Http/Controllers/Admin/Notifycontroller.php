<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;

class Notifycontroller extends Controller
{
    public function notify(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->view =='yes')
    		{
    			Contact::where('c_status',0)
			       ->update([
			           'c_status' => 1
			        ]);
    		}
    		$data=array();
    		$unseen_notification = Contact::select('c_name','c_title','created_at')->orderBy('id','DESC')->limit(5)->get();
    		  if($unseen_notification)
		          {
		            foreach ($unseen_notification as $row) {
		                $result1[] = array(
		                'name' => $row->c_name,
		                'title' => $row->c_title,
		                'created_at' => Carbon::createFromTimeStamp(strtotime($row->created_at))->diffForHumans(),
		            );
		            }
		          }
		     $notification = Contact::where('c_status','0')->count();
		      $data = array(
				  'notification'   => $result1,
				  'unseen_notification' => $notification,
				 );
          return json_encode($data);
    	}
    }
}
