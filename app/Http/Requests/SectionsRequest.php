<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionsRequest extends FormRequest
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
            'section_name'=>'required|max:225|unique:Sections,section_name,'.$this -> id,
            'description'=>'required|',
        ];
    }


    public function messages()
    {
        return [
            'section_name.required'=>'اسم القسم مطلوب',
            'section_name.unique'=>' اسم القسم موجود مسبقاً',
            'description.required'=>'وصف القسم مطلوب',
        ];
    }
}
