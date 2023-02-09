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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'product_nm' => 'required',
            'category_id' => 'required',
            'color' => 'required',
            'size' => 'required',
            'price' => 'required',
            'images' => 'required',
        ];
        return $rules;
    }

    public function messages()
    {
        $errors = [
            'product_nm.required' => 'Tên sản phẩm không được để trống!',
            'category_id.required' => 'Loại sản phẩm không được để trống!',
            'color.required' => 'Màu sắc không được để trống!',
            'size.required' => 'Kích cỡ không được để trống!',
            'price.required' => 'Đơn giá không được để trống!',
            'images.array' => 'Hình ảnh không được để trống!',
        ];
        return $errors;
    }
}
