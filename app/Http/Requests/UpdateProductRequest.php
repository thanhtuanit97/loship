<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name'=>'required|max:255|',
            'quantity'=>'required',
            'price'=>'required',
            'description'=>'required',
            'content'=>'required',
            'description_seo'=>'required',
            'keyword_seo'=>'required',
            'category_id'=>'required',
           
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên sản phẩm không được để trống.',
            'name.max'=>'Tên sản phẩm không quá 255 kí tự.',
            'name.unique'=>'Tên sản phẩm đã tồn tại trong hệ thống.',

            'quantity.required'=>'Số lượng sản phẩm không được để trống.',
            'price.required'=>'Giá sản phẩm không được để trống.',
            'description.required'=>'Mô tả sản phẩm không được để trống.',
            'content.required'=>'Nội dung sản phẩm không được để trống.',
            'description_seo.required'=>'Mô tả SEO sản phẩm không được để trống.',
            'keyword_seo.required'=>'Từ khóa SEO sản phẩm không được để trống.',
            'category_id.required'=>'Loại sản phẩm không được để trống.',
            
        ];
    }
}
