<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class product extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'name'=>'required|unique:products,name,'.$this->segment(4).',id',
                     'description'=>'required',
                     'img'=>'image',
                     'cate'=>'required|not_in:0'
        ];
    }
     public function messages(){
        return[
                    'name.required'=>'Vui lòng nhập tên danh mục',
                    'name.unique'=>'Tên sản phẩm đã bị trùng',
                    'description.required'=>'Bạn chưa nhập mô tả',
                    'img.required'=>'Chưa chọn ảnh',
                    'cate.required'=>'Chưa chọn danh mục',
                     'cate.not_in'=>'Chưa chọn danh mục',
                    'img.image'=>'Chỉ chọn ảnh'
        ];
    }
}
