<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
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
            'title' => 'required|unique:articles,title,'.$this->id,
            'description'=> 'required',
            'content'=>'required',
            'description_seo'=>'required',
            'title_seo'=>'required',
            
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Tên bài viết không được để trống.',
            'title.unique'=>'Tên bài viết đã tồn tại trong hệ thống.',
            'description.required'=>'Mô tả bài viết không được để trống.',
            'content.required'=>'Nội dung bài viết không được để trống.',
            'description_seo.required'=>'Meta Seo bài viết không được để trống.',
            'title_seo.required'=>'Title Seo bài viết không được để trống.',
            
        ];
    }
}
