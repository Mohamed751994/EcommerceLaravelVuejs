<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JoinRequest extends FormRequest
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
            'name' => 'required|max:255|regex:/^[\D]+$/',
            'email' => 'required|email|unique:joins,email',
            'phone' => 'required',
            'address' => 'required|max:255',
            'notes' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'اسم العميل مطلوب',
            'name.max' => 'اسم العميل طويل جدا',
            'name.regex' => 'اسم العميل يجب ان يكون مكون من حروف فقط',

            'email.required' => 'البريد الالكتروني مطلوب',
            'email.email' => 'البريد الالكتروني غير صحيح',
            'email.unique' => 'البريد الالكتروني موجود من قبل',

            'phone.required' => 'رقم هاتف العميل مطلوب',
            'phone.regex' => 'رقم الهاتف غير صحيح يجب ان يكون مكون من 10 ارقام فقط ويبدا ب (05)',

            'address.required' => 'عنوان العميل مطلوب',
            'address.max'  => 'العنوان طويل جدا',
        ];
    }
}
