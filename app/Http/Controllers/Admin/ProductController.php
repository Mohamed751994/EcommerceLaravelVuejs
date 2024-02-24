<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Traits\MainTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    use MainTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $content = Product::latest()->paginate($this->paginate);
        return view('admin_dashboard.products.index' , compact('content'));
    }

    public function create()
    {
        $categories = Category::pluck('id','name');
        return view('admin_dashboard.products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                $image = $this->uploadFile($request, 'image', 'uploads/');
                $data['image'] = $image;
            }
            $data['slug'] = str_replace(' ', '-', $data['slug']);
            Product::create($data);
            Session::flash('success', $this->insertMsg);
            return redirect()->back();
        } catch (\Exception $e) {
            Session::flash('error', 'Error:' .$e);
            return redirect()->back();
        }
    }


    public function edit(Product $product)
    {
        $content =  $product;
        $categories = Category::pluck('id','name');
        return view('admin_dashboard.products.edit', compact('content','categories'));
    }


    public function update(ProductRequest $request, Product $product)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                $image = $this->uploadFile($request, 'image', 'uploads/');
                $data['image'] = $image;
            }
            $data['slug'] = str_replace(' ', '-', $data['slug']);
            $product->update($data);
            Session::flash('success', $this->updateMsg);
            return redirect()->back();
        } catch (\Exception $e) {
            Session::flash('error', 'Error:' .$e);
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if(File::exists(public_path(str_replace(url("/"), '', $product->image))))
        {
            unlink(public_path(str_replace(url("/"), '', $product->image)));
        }
        $product->delete();
        Session::flash('success', $this->deleteMsg);
        return redirect()->back();
    }


}
