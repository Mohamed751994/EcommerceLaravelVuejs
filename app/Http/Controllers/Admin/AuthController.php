<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //login page
    public function login_page()
    {
        if(Auth::check())
        {
            return redirect()->route('admin.dashboard');
        }
        return view('admin_dashboard.login');
    }

    //login
    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        if (!Auth::attempt($data)) {
            Session::flash('error', ' البريد الإلكتروني أو كلمة المرور غير صحيحة');
            return redirect()->back()->withInput();
        }
        Session::flash('success', 'تم تسجيل الدخول بنجاح');
        return redirect()->route('admin.dashboard');
    }


}
