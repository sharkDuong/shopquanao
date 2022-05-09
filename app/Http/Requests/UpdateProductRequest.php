<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name' => [
                'required',
                Rule::unique('products')->ignore($this->product),
                'max:50',
            ],
            'code' => [
                'required',
                Rule::unique('products')->ignore($this->product),
            ],
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nhap ten vao ban oi',
            'name.unique' => 'Nhap ten khac di ban oi',
            'code.required' => 'Ong khong nhap code a',
        ];
    }
}
