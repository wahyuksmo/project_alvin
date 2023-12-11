<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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


Route::get('/register', [AuthController::class, 'register']);
// Route::get('/', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/register', [AuthController::class, 'regisProses']);
Route::post('/login', [AuthController::class, 'loginProses']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

//hanya menampilkan tampilan saja
Route::get('/admin', [DashboardController::class, 'index'])->middleware('is_admin');

//crud products
Route::resource('/product', ProductController::class)->middleware('is_admin');

//banner
Route::get('/banner', [DashboardController::class, 'banner'])->middleware('is_admin');
Route::get('/banner/add_banner', [DashboardController::class, 'add_banner'])->middleware('is_admin');
Route::post('/banner/store_banner', [DashboardController::class, 'store_banner'])->middleware('is_admin');
Route::get('/banner/edit_banner/{id}', [DashboardController::class, 'edit_banner'])->middleware('is_admin');
Route::post('/banner/update_banner', [DashboardController::class, 'update_banner'])->middleware('is_admin');
Route::post('/banner/delete_banner', [DashboardController::class, 'delete_banner'])->middleware('is_admin');


//gallery
Route::get('/gallery', [DashboardController::class, 'gallery'])->middleware('is_admin');
Route::get('/gallery/add_gallery', [DashboardController::class, 'add_gallery'])->middleware('is_admin');
Route::post('/gallery/store_gallery', [DashboardController::class, 'store_gallery'])->middleware('is_admin');
Route::get('/gallery/edit_gallery/{id}', [DashboardController::class, 'edit_gallery'])->middleware('is_admin');
Route::post('/gallery/update_gallery', [DashboardController::class, 'update_gallery'])->middleware('is_admin');
Route::post('/gallery/delete_gallery', [DashboardController::class, 'delete_gallery'])->middleware('is_admin');


//article
Route::get('/article', [ArticleController::class, 'index'])->middleware('is_admin');
Route::get('/article/add_article', [ArticleController::class, 'add_article'])->middleware('is_admin');
Route::post('/article/store_article', [ArticleController::class, 'store_article'])->middleware('is_admin');
Route::get('/article/edit_article/{id}',[ArticleController::class, 'edit_article'])->middleware('is_admin');
Route::post('/article/update_article', [ArticleController::class, 'update_article'])->middleware('is_admin');
Route::post('/article/delete_article', [ArticleController::class, 'delete_article'])->middleware('is_admin');

//category
Route::get('/category', [ArticleController::class, 'category'])->middleware('is_admin');
Route::get('/category/add_category', [ArticleController::class, 'add_category'])->middleware('is_admin');
Route::post('/category/store_category', [ArticleController::class, 'store_category'])->middleware('is_admin');
Route::get('/category/edit_category/{id}', [ArticleController::class, 'edit_category'])->middleware('is_admin');
Route::post('/category/delete_category', [ArticleController::class, 'delete_category'])->middleware('is_admin');
Route::post('/category/update_category', [ArticleController::class, 'update_category'])->middleware('is_admin');


Route::get('/', [HomeController::class, 'index']);