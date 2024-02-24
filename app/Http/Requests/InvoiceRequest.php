<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'customer_name' => 'required|max:255|regex:/^[\D]+$/',
            'customer_email' => 'required|email',
            'customer_phone' => 'required', //|regex:/(^05[0-9]{8}$)/
            'customer_address' => 'required|max:255',
            //'receipt_date' => 'required|date|after:today',
            'products' => 'required|array',
            'notes' => 'nullable',
            'totalPrice' => 'nullable',
            'invoiceID' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'customer_name.required' => 'اسم العميل مطلوب',
            'customer_name.max' => 'اسم العميل طويل جدا',
            'customer_name.regex' => 'اسم العميل يجب ان يكون مكون من حروف فقط',

            'customer_email.required' => 'البريد الالكتروني مطلوب',
            'customer_email.email' => 'البريد الالكتروني غير صحيح',

            'customer_phone.required' => 'رقم هاتف العميل مطلوب',
            'customer_phone.regex' => 'رقم الهاتف غير صحيح يجب ان يكون مكون من 10 ارقام فقط ويبدا ب (05)',

            'customer_address.required' => 'عنوان العميل مطلوب',
            'customer_address.max'  => 'العنوان طويل جدا',

            'products.required' => 'المنجات مطلوبه',
            'products.array' => 'المنتجات يجب ان تكون علي شكل مصفوفه',

            'products.*.product_name.required' => 'اسم المنتج مطلوب',
            'products.*.product_name.max' => 'اسم المنتج طويل جدا',
            'products.*.product_name.regex' => 'يجب ان يكن اسم المنتج من حروف فقط',

            'products.*.qty.required' => 'كملة المنتج مطلوبة',
            'products.*.qty.numeric' => 'يجب ان تكون كمية المنتج رقماً',
            'products.*.qty.min' => 'يجب ان لا تقل كمية المنتج عن 1',

            'products.*.total_amount.required' => 'اجمالي سعر المنتج مطلوب',
            'products.*.total_amount.numeric' => 'يجب ان يكون اجمالي سعر المنتج رقماً',
            'products.*.total_amount.min' => 'يجب ان لا يقل اجمالي سعر المنتج عن 1',
        ];
    }
}
