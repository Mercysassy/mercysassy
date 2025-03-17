<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\UserController;
use App\http\Controllers\BlogController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('about', function () {
    return view('pages.about');
});
Route::get('services', function () {
    return view('pages.services');
});
Route::get('blog', function () {
    return view('pages.blog');
});
Route::get('contact', function () {
    return view('pages.contact');
});


Route::post('createregister', [UserController::class, 'createregister'])->name('createregister');
Route::post('checklogin', [UserController::class, 'checklogin'])->name('checklogin');
Auth::routes();
Route::middleware(['auth'])->group(function(){
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/addblog',[BlogController::class, 'addblog'])->name(('addblog'));
Route::get('/viewblog',[BlogController::class, 'viewblog'])->name(('viewblog'));
Route::get('/viewsingleblog/{slug}',[BlogController::class, 'viewsingleblog'])->name(('viewsingleblog'));
Route::post('createblog',[BlogController::class,'createblog'])->name('createblog');
    // Route::view('/register', 'dashboard.admin.register')->name('register');
    // Route::get('/home', [AdminController::class, 'home'])->name('home');

});


