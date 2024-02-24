<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
Use App\Models\Product;
use App\Traits\MainTrait;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    use MainTrait;

    //get all products
    public function get_all_products(Request $request)
    {
        try {
            $products = Product::with('category');
            if($request->pageName && $request->pageName == 'home')
            {
                $products = $products->limit(24);
            }
            $products = $products->latest()->get();
            return $this->successResponse('جميع المنتجات', $products);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }
    }

    public function get_single_product($id,$slug)
    {
        try {
            $product = Product::with('category')->where(['id'=>$id,'slug'=>$slug])->first();
            if(!$product)
            {
                return $this->errorResponse('المنتج غير موجود');
            }
            $products = Product::with('category')->where('id','!=',$id)->limit(4)->inRandomOrder()->get();
            return $this->successResponse('بيانات المنتج', ['product' =>$product, 'products'=>$products]);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }
    }

}
