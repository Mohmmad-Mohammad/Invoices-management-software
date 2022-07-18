<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            'Product_name'=>'required|max:225|unique:Products,Product_name,'.$this -> id,
            'section_id'=>'required|',
//            'description'=>'',
            //
        ];
    }
    public function messages(){
       return [
           'section_id.required'=>'اسم القسم مطلوب',
           'Product_name.required'=>'اسم المنتج مطلوب',
           'Product_name.unique'=>' اسم المنتج موجود مسبقاً',
           'description.required'=>'وصف المنتج مطلوب',
        ];
    }


}
