<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
Use App\Models\Category;
use App\Traits\MainTrait;
class CategoryController extends Controller
{

    use MainTrait;
    public function create_new_category(CategoryRequest $request)
    {
        try {
            $data = $request->validated();

            $category = Category::create($data);
            return $this->successResponse('تم إضافة التصنيف بنجاح', $category);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }
    }

    public function get_all_categories()
    {
        try {

            $categories = Category::latest()->get();
            return $this->successResponse('جميع التصنيفات', $categories);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }
    }

    public function get_single_category($id)
    {
        try {

            $category = Category::with('products')->findOrFail($id);
            return $this->successResponse('بيانات التصنيف', $category);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }
    }

}
