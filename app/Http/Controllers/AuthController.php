<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự'
        ]);

        $user = NguoiDung::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->mat_khau)) {
            Auth::loginUsingId($user->id_nguoidung);
            
            return redirect()->intended(route('home'))->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.'
        ])->withInput();
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ten_nguoidung' => 'required|string|max:100|min:2',
            'email' => 'required|string|email|max:150|unique:nguoidung,email',
            'password' => 'required|string|min:6|confirmed',
            'so_dien_thoai' => 'required|string|regex:/^[0-9]{10,11}$/',
            'dia_chi' => 'required|string|max:255|min:10',
            'ngay_sinh' => 'required|date|before:today',
            'gioi_tinh' => 'required|in:Nam,Nữ,Khác'
        ], [
            'ten_nguoidung.required' => 'Vui lòng nhập họ tên',
            'ten_nguoidung.min' => 'Họ tên phải có ít nhất 2 ký tự',
            'ten_nguoidung.max' => 'Họ tên không được quá 100 ký tự',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email này đã được sử dụng',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp',
            'so_dien_thoai.required' => 'Vui lòng nhập số điện thoại',
            'so_dien_thoai.regex' => 'Số điện thoại phải có 10-11 chữ số',
            'dia_chi.required' => 'Vui lòng nhập địa chỉ',
            'dia_chi.min' => 'Địa chỉ phải có ít nhất 10 ký tự',
            'ngay_sinh.required' => 'Vui lòng chọn ngày sinh',
            'ngay_sinh.before' => 'Ngày sinh phải trước ngày hôm nay',
            'gioi_tinh.required' => 'Vui lòng chọn giới tính'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = NguoiDung::create([
            'ten_nguoidung' => $request->ten_nguoidung,
            'email' => $request->email,
            'mat_khau' => Hash::make($request->password),
            'so_dien_thoai' => $request->so_dien_thoai,
            'dia_chi' => $request->dia_chi,
            'ngay_sinh' => $request->ngay_sinh,
            'gioi_tinh' => $request->gioi_tinh,
            'loai_nguoidung' => 'customer'
        ]);

        Auth::loginUsingId($user->id_nguoidung);

        return redirect()->route('home')->with('success', 'Đăng ký thành công! Chào mừng bạn đến với Venus!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Đăng xuất thành công!');
    }
}
