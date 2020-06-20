<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use Hash;
use Str;
use App\Model\Customer;
use App\Model\Category;

class CustomerController extends Controller
{
    public function __construct()
    {
        $categories = Category::all();
        view()->share('categories', $categories);
    }

    public function getAdd()
    {
        return view('admin.customer.add');
    }

    public function postadd(Request $request)
    {
        $this->validate($request, [
            // 'firstname'=>'min:3',
            // 'lastname'=>'min:3',
            'address'=>'min:3',
            'numberphone'=>'min:10|numeric',
            'email'=>'min:3|unique:customers',
        ], [
            // 'firstname.min'=>'Tên phải ít nhất có 3 ký tự',
            // 'lastname.min'=>'Họ phải ít nhất có 3 ký tự',
            'address.min'=>'Địa chỉ phải ít nhất có 3 ký tự',
            'numberphone.min'=>'Số điện thoại phải ít nhất có 10 số',
            'numberphone.numeric'=>'Số điện thoại sai',
            'email.min'=>'Email sai',
            'email.unique'=>'Email đã tồn tại',
        ]);

        $customer = new Customer;
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->address = $request->address;
        $customer->phonenumber = $request->phonenumber;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->save();

        return redirect()->route('list_customer')->with('message', 'Thêm thành công');
    }

    public function getList()
    {
        $customer = Customer::all();
        return view('admin.customer.list', compact('customer'));
    }

    public function getEdit($id)
    {
        $customer = Customer::find($id);
        return view('admin.customer.edit', compact('customer'));
    }

    public function postEdit($id, Request $request)
    {
        $this->validate($request, [
            // 'firstname'=>'min:3',
            // 'lastname'=>'min:3',
            'address'=>'min:3',
            'numberphone'=>'min:10|numeric',
            'email'=>'min:3',
        ], [
            // 'firstname.min'=>'Tên phải ít nhất có 3 ký tự',
            // 'lastname.min'=>'Họ phải ít nhất có 3 ký tự',
            'address.min'=>'Địa chỉ phải ít nhất có 3 ký tự',
            'numberphone.min'=>'Số điện thoại phải ít nhất có 10 số',
            'numberphone.numeric'=>'Số điện thoại sai',
            'email.min'=>'Email sai',
        ]);

        $customer = Customer::find($id);
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->address = $request->address;
        $customer->phonenumber = $request->phonenumber;
        $customer->email = $request->email;
        if ($request->ChangePassword == "on") {
            $this->validate(request(), [
                'password' => 'required|min:3|max:32',
                'passwordAgain' => 'required|same:password',
            ], [
                'password.required' => 'Bạn chưa nhập mật khẩu mới',
                'password.min' => 'Mật khẩu phải từ 3 đến 32 ký tự',
                'password.max' => 'Mật khẩu phải từ 3 đến 32 ký tự',
                'passwordAgain.required' => 'Bạn phải xác nhận lại mật khẩu mới',
                'passwordAgain.same' => 'Mật khẩu nhập lại chưa đúng'
            ]);
            $customer->password = bcrypt($request->password);
        }
        $customer->save();
        return redirect()->route('list_customer')->with('message', 'Sửa thành công');
    }

    public function postDelete($id)
    {
        Customer::find($id)->delete();
        return back()->with('message', 'Xóa thành công');
    }

    public function getLogin()
    {
        return view('fontend.pages.login');
    }

    public function postLogin(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('customer')->attempt($arr)) {
            return redirect()->route('home');
        } else {
            return back()->with('message_login', 'Email hoặc mật khẩu không đúng!');
        }
    }

    public function getLogout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('home');
    }

    public function getSignup()
    {
        return view('fontend.pages.signup');
    }

    public function postSignup(Request $request)
    {
        $this->validate($request, [
            // 'firstname'=>'min:3',
            // 'lastname'=>'min:3',
            'address'=>'min:3',
            'numberphone'=>'min:10|numeric',
            'email'=>'min:3|unique:customers',
        ], [
            // 'firstname.min'=>'Tên phải ít nhất có 3 ký tự',
            // 'lastname.min'=>'Họ phải ít nhất có 3 ký tự',
            'address.min'=>'Địa chỉ phải ít nhất có 3 ký tự',
            'numberphone.min'=>'Số điện thoại phải ít nhất có 10 số',
            'numberphone.numeric'=>'Số điện thoại sai',
            'email.min'=>'Email sai',
            'email.unique'=>'Email đã tồn tại',
        ]);
        
        $customer = new Customer;
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->address = $request->address;
        $customer->phonenumber = $request->phonenumber;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->save();

        return redirect()->route('login_customer');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $finduser = Customer::where('google_id', $user->id)->first();

        if ($finduser) {

            Auth::guard('customer')->login($finduser);

            return redirect()->route('home');
        } else {
            $newUser = Customer::create([
                'firstname' => $user->user['family_name'],
                'lastname' => $user->user['given_name'],
                'email' => $user->email,
                'google_id' => $user->id,
                'password' => Hash::make(Str::random(16))
            ]);

            Auth::guard('customer')->login($newUser);

            return redirect()->route('home');
        }
    }
}
