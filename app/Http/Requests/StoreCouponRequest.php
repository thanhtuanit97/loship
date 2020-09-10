<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCouponRequest extends FormRequest
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
            'name'=>'required|unique:coupons,name'.$this->id,
            'condition'=>'required',
            'apply_type'=>'required',
            'number'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'code'=>'unique:coupons,code'.$this->id
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên mã giảm giá không được để trống',
            'name.unique'=>'Tên mã giảm giá đã tồn tại trong hệ thống',
            'condition.required'=>'Loại mã giảm giá không được để trống',
            'apply_type.required'=>'Hình Thức mã giảm giá không được để trống',
            'number.required'=>'Số tiền mã giả giám không được để trống',
            'start_date.required'=>'Ngày bắt đầu mã giảm giá không được để trống',
            'end_date.required'=>'ngày kết thúc mã giả giảm không được để trống',
            'code.unique'=>'Mã CODE giảm giá đã tồn tại trong hệ thống.'
        ];
    }
}
