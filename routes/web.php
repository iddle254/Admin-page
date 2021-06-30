<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::middleware('admin')->group(function ()
{
    Route::resource('admin/users', 'App\Http\Controllers\AdminUsersController');

    Route::resource('admin/posts', 'App\Http\Controllers\AdminPostsController');

    Route::get('/admin', function () {
        return view('admin.index');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





// Route::post('/admin/users/create', [App\Http\Controllers\AdminUsersController::class, 'store'])->name('users.store');

// Route::resource('admin/users/create', 'App\Http\Controllers\AdminUsersController');
