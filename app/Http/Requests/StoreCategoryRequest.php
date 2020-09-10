<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'c_name'=>'required|max:255|unique:catgories,name',
            'icon'=>'required|min:15',
            'c_title_seo'=>'required',
            'c_description_seo'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'c_name.required'=>'Ten Danh Muc Khong Duoc De Trong',
            'c_name.max'=>'Ten Danh Muc Qua Ngan',
            'c_name.unique'=>'Ten Danh Muc Da Ton Tai Trong He Thong',
            'icon.required'=>'Icon Khong Duoc De Trong',
            'icon.min'=>'Icon qua ngan',
            'c_title_seo.required'=>'Icon Khong Duoc De Trong',
            'c_description_seo.required'=>'Icon Khong Duoc De Trong',
        ];
    }
}
