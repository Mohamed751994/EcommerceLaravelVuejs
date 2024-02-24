<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255|unique:categories|regex:/^[\D]+$/',
        ];
    }
    
    public function messages(): array
    {
        return [
            'name.required' => 'اسم التصنيف مطلوب',
            'name.max' => ' اسم التصنيف طويل جدا',
            'name.unique' => 'اسم التصنيف موجود مسبقا',
            'name.regex' => 'اسم التصنيف يجب ان يكون مكون من حروف فقط',
        ];
    }
}
