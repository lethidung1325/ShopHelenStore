<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\User;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.layouts.index');
    }

    public function getLogin()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:3|max:16'
        ], [
            'email.required' => 'Bạn chưa nhập email',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu phải từ 3 đến 16 ký tự',
            'password.max' => 'Mật khẩu phải từ 3 đến 16 ký tự'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin_index');
        } else {
            return redirect()->back()->with('message_login', 'Sai tài khoản hoặc mật khẩu');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('login_admin')->with('message', 'Đăng xuất thành công');
    }
}
