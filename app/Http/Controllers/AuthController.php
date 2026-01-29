<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Trả về view SignIn
    public function signIn()
    {
        return view('signin');
    }

    // Kiểm tra dữ liệu từ form
    public function checkSignIn(Request $request)
    {
        $data = ['username' => 'Hoangbh',
                'password' => '123abc',
                'mssv' => '0005367',
                'lopmonhoc' => '67PM2',
                'gioitinh' => 'nam'];

        if ($request->password !== $request->repass) {
            return "Đăng ký thất bại";
        }

        if ($request->username === $data['username'] &&
            $request->password === $data['password'] &&
            $request->mssv === $data['mssv'] &&
            $request->lopmonhoc === $data['lopmonhoc'] &&
            $request->gioitinh === $data['gioitinh']) {
            return "Đăng ký thành công!";
        }

        return "Đăng ký thất bại";
    }
}