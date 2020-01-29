<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;

class Contactcontroller extends Controller
{
      public function getcontact()
      {
      	return view('frontend.contact');
      }
       public function postcontact(Request $request)
      {
      	$data = $request->except('_token');
      	$data['created_at'] = $data['updated_at'] = Carbon::now();
      	Contact::insert($data);
      	return redirect()->back();
      }
}
