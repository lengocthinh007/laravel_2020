<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cates;
use App\Models\products;
use App\Models\product_image;
use Illuminate\Support\Str;
use App\Http\Requests\product;



class Productcontroller extends Controller
{
    public function listProduct(Request $request){
        $data = products::select('id','name','price','cate_id','pro_total_rating','pro_total_number','created_at','pro_active','pro_hot','pro_sale','image','pro_number');
        $cate = cates::select('id','name','parent_id')->get()->toArray();
         if($request->name)
         {
            $data = $data->where('name','like','%'.$request->name.'%');
         }
          if($request->cate)
         {
            $data = $data->where('cate_id',$request->cate);
         }
         $data = $data->orderBy('id','DESC')->get();
        return view('backend.listproducts',compact('data','cate'));
    }
       public function getadd(){
    	$cate = cates::select('id','name','parent_id')->get()->toArray();
    	return view('backend.addproduct',compact('cate'));
    }
     public function postadd(product $request){
    	
    	 $this-> InsertOrupdate($request);
     	
     	 return redirect()->intended('admin/product/')->with(['level'=>'success','message'=>'Thêm thành công']);
    }
    public function postedit(product $request,$id){
                  
         $this-> InsertOrupdate($request,$id);
         return redirect()->intended('admin/product/')->with(['level'=>'success','message'=>'Sửa thành công']);
    }
      public function getdelete($id){
        $product_img =  product_image::select('image')->where('product_id',$id)->get()->toArray();
        if(!empty($product_img)){
        foreach ( $product_img as $value) {
             unlink("public/HinhDetails/".$value["image"]);
        }
        }
        $product = products::find($id);
        // if(file_exists("public/Hinh/".$product->image)){
        //  unlink("public/Hinh/".$product->image);
        // }
        if(isset($product->image)) unlink("public/Hinh/".$product->image);
         $product->delete($id);
          return redirect()->intended('admin/product/')->with(['level'=>'success','message'=>'Xóa thành công']);
      }
       public function getedit($id){
        $cate = cates::select('id','name','parent_id')->get()->toArray();
        $data= products::find($id);
        $product_img =  product_image::select('id','image')->where('product_id',$id)->get()->toArray();
                return view('backend.editproducts',compact('cate','data','product_img'));
       }
       public function getdelimg(Request $request,$id){
        if($request->ajax()){
            $idHinh= $id;
            $image_detail= product_image::find($idHinh);
            if(!empty($image_detail)){
                if(file_exists("public/HinhDetails/".$image_detail->image)){
                     unlink("public/HinhDetails/".$image_detail->image);
                }
                $image_detail->delete();
            }
            return "OK";
        }

       }
         public function InsertOrupdate($request,$id=""){
            $product = new products;
            if($id) {
                $product = products::find($id);
            }
             $product->name = $request->name;
        $product->alias = changeTitle($request->name);
        $product->price = $request->price;
        $product->pro_sale = $request->Sale;
        $product->pro_number = $request->pro_number;
        $product->pro_title_seo  = $request->title ? $request->title  : $request->name;
        $product->pro_content = $request->content ?  $request->content : '';
        $product->description_seo  = $request->description_seo;
        $product->description = $request->description;
        $product->user_id = 1;
        $product->cate_id = $request->cate;
          if($request->img){
             if(isset($product->image)){
                     unlink("public/Hinh/".$product->image);
                }
            $file = $request->File('img');
            $filename = $file->getClientOriginalName();
            $Hinh = $filename;
            while(file_exists("public/Hinh/".$Hinh))
            {
                $Hinh = Str::random(4)."_".$filename;
            }
            $file->move("public/Hinh",$Hinh);
            $product->image = $Hinh;
             }
        $product->save();
        $product_id=$product->id;
            
          if($request->images){
            foreach ($request->images as $file) {
                $product_img = new product_image();
                if(isset($file)){
                    $filename = $file->getClientOriginalName();
                    $Hinh = $filename;
                    while(file_exists("public/HinhDetails/".$Hinh))
                        {
                            $Hinh = Str::random(4)."_".$filename;
                         }
                    $product_img->image = $Hinh;
                    $product_img->product_id=$product_id;
                    $file->move("public/HinhDetails",$Hinh);
                    $product_img->save();
                }
            }
          }
        
         }
           public function action($action,$id){
            if($action){
                $product = products::find($id);
                switch ($action) {
                    case 'active':
                        $product->pro_active = $product->pro_active ? 0 : 1;
                        break;
                    case 'hot':
                        $product->pro_hot = $product->pro_hot ? 0 : 1;
                        break;    
                }
                $product->save();
            }
            return redirect()->back();
        }

}
