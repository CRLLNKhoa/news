<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CustomAuthController;

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
//client
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/chuyen-muc/{slug}', [IndexController::class, 'category'])->name('chuyen-muc');
Route::get('/xem-tin/{slug}', [IndexController::class, 'detail'])->name('xem-tin');
Route::get('/pho-bien', [IndexController::class, 'excute'])->name('pho-bien');
Route::get('/thinh-hanh', [IndexController::class, 'excute'])->name('thinh-hanh');
Route::get('/tin-moi', [IndexController::class, 'excute'])->name('tin-moi');
Route::get('/forums', [IndexController::class, 'forums'])->name('forums');
Route::post('/search', [IndexController::class, 'search'])->name('search');
Route::get('/add/forum',[IndexController::class, 'addforum'])->name('addforum')->middleware('auth');
Route::get('/mypost',[IndexController::class, 'mypost'])->name('my-post')->middleware('auth');
Route::get('/editforum/{forum}',[IndexController::class, 'editforum'])->name('editforum')->middleware('auth');
Route::post('/updateforum/{id}',[IndexController::class, 'updateforum'])->name('updateforum');
Route::post('/store/forum', [IndexController::class, 'storeforum'])->name('storeforum');


//admin

Route::group(['middleware' => 'admin'], function () {
Route::resource('/category', CategoryController::class);
Route::resource('/post', PostController::class);
Route::resource('/video', VideoController::class);
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [CustomAuthController::class, 'profile'])->name('profile');
Route::post('changeprofile', [CustomAuthController::class, 'changeProfile'])->name('changeprofile');
});

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
