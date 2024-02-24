<?php

namespace App\Http\Controllers;

Use App\Models\Blog;
use App\Traits\MainTrait;
use Illuminate\Http\Request;
class BlogController extends Controller
{
    use MainTrait;

    //get all products
    public function get_all_blogs()
    {
        try {
            $blogs = Blog::latest()->get();
            return $this->successResponse('جميع المقالات', $blogs);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }
    }

    public function get_single_blog($slug)
    {
        try {
            $blog = Blog::where('slug_url', $slug)->first();
            if(!$blog)
            {
                return $this->errorResponse('المقالة غير موجودة',$blog);
            }
            $blogs = Blog::where('id', '!=', $blog->id)->limit(3)->latest()->get();
            return $this->successResponse('بيانات المقالة', ['blog'=>$blog, 'blogs' =>$blogs]);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }
    }

}
