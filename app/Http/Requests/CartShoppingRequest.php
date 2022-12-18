<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartShoppingRequest extends FormRequest
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
            'color' => 'required',
            'size' => 'required',
            'quantity' => 'numeric|gt:0',
        ];
        return $rules;
    }

    public function messages()
    {
        $errors = [
            'color.required' => 'Vui lòng chọn màu sắc!',
            'size.required' => 'Vui lòng chọn kích cỡ!',
            'quantity.gt' => 'Vui lòng chọn số lượng!',
        ];
        return $errors;
    }
}
