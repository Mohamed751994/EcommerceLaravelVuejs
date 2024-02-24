<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $image = request()->isMethod('put') ? 'nullable|mimes:png,jpg,jpeg,webp,svg,gif,jiff|max:5000' : 'required|mimes:png,jpg,jpeg,webp,svg,gif,jiff|max:5000';
        return [
            'category_id' => 'required',
            'name' => 'required|max:255', //regex:/^[\D]+$/
            'size' => 'required|max:255',
            'slug' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|gt:0',
            'image'=> $image,
            'alt'=> 'nullable',

        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'القسم مطلوب',

            'name.required' => 'اسم المنتج مطلوب',
            'name.max' => ' اسم المنتج طويل جدا',
//            'name.regex' => 'اسم المنتج يجب ان يكون مكون من حروف فقط',
            'size.required' => 'المقاس مطلوب',
            'slug.required' => 'عنوان رابط الصفحة مطلوب',

            'description.required' => 'وصف المنتج مطلوب',

            'price.required' => 'سعر المنتج مطلوب',
            'price.gt' => 'يجب ان يكون سعر المنتج اكبر من 0',

            'image.mimes' =>'يجب أن تكون صيغة الصورة (png - jpg - jpeg - webp - svg - gif) ',
            'image.max' =>'يجب أن لا تتعدي حجم الصورة 5 ميجا بايت',
        ];
    }
}
