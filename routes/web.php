<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Admin\FrontendController;
 use App\Http\Controllers\Admin\CategoryController;
 use App\Http\Controllers\Admin\ProductController;





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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group( function () {

//    Route::get('/dashboard', array(App\Http\Controllers\Admin\FrontendController::class));


//For admin Category
    Route::get('/dashboard', [App\Http\Controllers\Admin\FrontendController::class, 'index'])->name('dashboard');
    Route::get('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('index');
    Route::get('/add-category', [App\Http\Controllers\Admin\CategoryController::class, 'add'])->name('add_category');
    Route::Post('/insert-category', [App\Http\Controllers\Admin\CategoryController::class, 'insert'])->name('insert_category');
    Route::get('/edit-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('edit_category');
    Route::put('/update-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('update_category');
    Route::get('/delete-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('delete_category');

//For admin Produts
    Route::get('product',[ProductController::class,'index']);
    Route::get('add-product',[ProductController::class,'add']);
    Route::Post('insert         -product',[ProductController::class,'insert']);
    Route::get('edit-product/{id}',[ProductController::class,'edit']);
    Route::put('update-product/{id}',[ProductController::class,'update']);
    Route::get('delete-product/{id}',[ProductController::class,'destroy']);

//For User
    Route::get('users',[DashboardController::class,'users']);
    Route::get('view-users/{id}',[DashboardController::class,'viewuser']);



//Paginate


});

