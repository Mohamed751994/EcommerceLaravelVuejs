<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
        $slug = request()->isMethod('put') ? 'required|unique:blogs,slug_url,'.\Request::segment(3).',id|max:255' : 'required|unique:blogs,slug_url|max:255';
        $image = request()->isMethod('put') ? 'nullable|mimes:png,jpg,jpeg,webp,svg,gif,jiff|max:5000' : 'required|mimes:png,jpg,jpeg,webp,svg,gif,jiff|max:5000';
        return [
            'title' => 'required|max:255',
            'slug_url' => $slug,
            'short_description' => 'required|max:255',
            'description' => 'required',
            'image'=> $image,
            'alt'=> 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'العنوان  مطلوب',
            'title.max' => ' يجب أن يكون العنوان أقل من 255 حرف',
            'slug_url.required' => 'عنوان الurl مطلوب',
            'slug_url.max' => ' يجب أن يكون عنوان الurl  أقل من 255 حرف',
            'slug_url.unique' => 'عنوان الurl موجود من قبل ',
            'short_description.required' => 'وصف قصير مطلوب',
            'short_description.max' => '  يجب أن يكون الوصف القصير أقل من 255 حرف',
            'description.required' => 'الوصف مطلوب',
            'image.required' =>'الصورة مطلوبة ',
            'image.mimes' =>'يجب أن تكون صيغة الصورة (png - jpg - jpeg - webp - svg - gif) ',
            'image.max' =>'يجب أن لا تتعدي حجم الصورة 5 ميجا بايت',
        ];
    }
}
