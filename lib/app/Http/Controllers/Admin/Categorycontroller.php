<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cates;
use App\Http\Requests\caterequest;

class Categorycontroller extends Controller
{
      public function getaddcate(){
    	$parent = cates::select('id','name','parent_id')->get()->toArray();
    	return view('Backend.addcate',compact('parent'));
    }
     	public function postaddcate(caterequest $request){
   	     $this-> InsertOrupdate($request);
   		 return redirect()->intended('admin/category/')->with(['level'=>'success','message'=>'Thêm thành công']);
   		
   	}
   	 public function listcate(){
    $data = cates::select('id','name','parent_id')->orderBy('id','DESC')->get()->toArray();
   		return view('backend.listcate',compact('data'));
    }
      public function getdelete($id){
        $parent = cates::where('parent_id',$id)->count();
        if($parent==0)
        {
        cates::destroy($id);
         return redirect()->intended('admin/category/')->with(['level'=>'success','message'=>'Xóa thành công']);
       }
       else
       {
        echo "<script type='text/javascript'>
              alert('Sorry ! Bạn không thể xóa cate này ');
              window.location ='";
              echo route('admin.cate.list');
              echo "'
              </script>";
       }
       }
        public function getedit($id){
      $data=cates::findOrFail($id)->toArray();
      // $parent = cates::select('id','name','parent_id')->get()->toArray();
      $parent = cates::where('id', '<>', $id)->get()->toArray();
      return view('Backend.editcategory',compact('parent','data'));
    }
     public function postedit(caterequest $request,$id){
      // $url_segment = \Request::segment(4);
      //  $this->validate($request,
      //       [
      //           'name'=>'unique:cates,name,'.$url_segment.',id'
      //       ],
      //       [
      //           'name.unique'=>'Tên danh mục đã bị trùng'
                  
      //       ]);
        $this-> InsertOrupdate($request,$id);
       return redirect()->intended('admin/category/')->with(['level'=>'success','message'=>'Sửa thành công']);
     
    }
     public function InsertOrupdate($request,$id=""){
      $category = new cates;
      if($id)  $category = cates::find($id);
      $category->name = $request->name;
      $category->alias = changeTitle($request->name);
      $category->order = $request->order;
      $category->parent_id = $request->parent_id;
      $category->keywords = $request->keywords;
      $category->description = $request->description;
      $category->save();
     }
}
