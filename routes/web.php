<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\UserController;

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
Auth::routes();
Route::middleware(['auth:admin'])->group(function(){
    // Route::view('/register', 'dashboard.admin.register')->name('register');
    Route::get('/home', [AdminController::class, 'home'])->name('home');

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
