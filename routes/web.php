<?php

use Illuminate\Support\Facades\Route;

// Home page
Route::get('/', function () {
    return view('home');
});

// Product groups
Route::prefix('product')->group(function () {
    // /product
    Route::get('/', function () {
        $products = [
            ['id' => 1, 'name' => 'iPhone 15', 'price' => 25000000],
            ['id' => 2, 'name' => 'Samsung S24', 'price' => 22000000],
        ];
        return view('product.index', compact('products'));
    })->name('product.index');

    // /product_add
    Route::get('/add', function () {
        return view('product.add');
    })->name('product.add');

    // /product/{id}
    Route::get('/{id?}', function ($id = '123') {
        return "Chi tiết sản phẩm ID: $id";
    })->where('id', '.*');
});

// Sinh vien
Route::get('/sinhvien/{name?}/{mssv?}', function (
    $name = "Bui Huy Hoang",
    $mssv = "0005367"
) {
    return view('sinhvien', compact('name', 'mssv'));
})->name('sinhvien');

// Ban co
Route::get('/banco/{n?}', function ($n = 8) {
    return view('banco', compact('n'));
})->name('banco');

// Nhập tuổi
Route::get('/age', function () {
    return view('age');
})->name('age');
Route::post('/age', function (\Illuminate\Http\Request $request) {
    session(['age' => $request->age]);
    return redirect('/protected');
});
Route::get('/protected', function () {
    return "Chào mừng bạn, đủ 18 tuổi!";
})->middleware('check.age');

// 404 Page
Route::fallback(function () {
    return response()->view('error.404', [], 404);
});

use App\Http\Controllers\AuthController;

// Đăng ký tài khoản
Route::get('/signin', [AuthController::class, 'signIn'])->name('signin');
Route::post('/checksignin', [AuthController::class, 'checkSignIn'])->name('check.signin');
