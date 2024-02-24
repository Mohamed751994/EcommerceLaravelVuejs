<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Traits\MainTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    use MainTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $content = Blog::latest()->paginate($this->paginate);
        return view('admin_dashboard.blogs.index' , compact('content'));
    }

    public function create()
    {
        return view('admin_dashboard.blogs.create');
    }

    public function store(BlogRequest $request)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                $image = $this->uploadFile($request, 'image', 'uploads/');
                $data['image'] = $image;
            }
            $data['slug_url'] = str_replace(' ', '-', $data['slug_url']);
            Blog::create($data);
            Session::flash('success', $this->insertMsg);
            return redirect()->back();
        } catch (\Exception $e) {
            Session::flash('error', 'Error:' .$e);
            return redirect()->back();
        }
    }


    public function edit(Blog $blog)
    {
        $content =  $blog;
        return view('admin_dashboard.blogs.edit', compact('content'));
    }


    public function update(BlogRequest $request, Blog $blog)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                $image = $this->uploadFile($request, 'image', 'uploads/');
                $data['image'] = $image;
            }
            $data['slug_url'] = str_replace(' ', '-', $data['slug_url']);
            $blog->update($data);
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
    public function destroy(Blog $blog)
    {
        if(File::exists(public_path(str_replace(url("/"), '', $blog->image))))
        {
            unlink(public_path(str_replace(url("/"), '', $blog->image)));
        }
        $blog->delete();
        Session::flash('success', $this->deleteMsg);
        return redirect()->back();
    }


}
