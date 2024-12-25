<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChirpController; //นำเข้า ChirpController
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get('/user', [UserController::class, 'index']); //เข้าแบบget UserController ไปทำงานที่ index ในไฟล์ UserController

// Route::get('/user/{id}', function (string $id) {
//     return 'User '.$id;
// });

Route::get('/user/{user}', [UserController::class, 'show']);

Route::get('/products', [ProductController::class, 'index'])
->middleware(['auth', 'verified'])->name('Products.Index');
Route::get('/products/{id}', [ProductController::class, 'show'])
->middleware(['auth', 'verified']);


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); //ตัวกลางถ้าจะเข้า *dashboard จะเข้าต้องรหัส

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('chirps', ChirpController::class)
->only(['index', 'store', 'update', 'destroy']) // ให้chitps มีการโชว์ข้อมูล ลบ แก้ไข
->middleware(['auth', 'verified']);  //middleware คือการ คัดกรองเช่นต้องใส่รหัส

require __DIR__.'/auth.php';
