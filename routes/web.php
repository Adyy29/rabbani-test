<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Models\product;
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
    return view('welcome',[
        'outlets' => product::all()
    ]);
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/service', function () {
    return view('service');
});
Route::get('/contact', function () {
    return view('contact');
});

route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/create', [AdminController::class, 'create']);
    Route::resource('/admin', AdminController::class);
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'gas']);

Route::post('/logout', [AuthController::class, 'keluar']);
