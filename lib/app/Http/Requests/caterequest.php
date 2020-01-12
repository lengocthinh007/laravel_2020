<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class caterequest extends FormRequest
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
             'name'=>'required|unique:cates,name,'.$this->segment(4).',id',
                     'description'=>'required',
                     'order'=>'numeric'
        ];
    }
     public function messages(){
        return[
                    'name.required'=>'Vui lòng nhập tên danh mục',
                    'name.unique'=>'Tên danh mục đã bị trùng',
                    'description.required'=>'Bạn chưa nhập mô tả',
                    'order.numeric'=>"phải nhập số"
        ];
    }
}
