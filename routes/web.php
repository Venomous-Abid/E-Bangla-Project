<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout']);

//products
Route::get('/all-categories',[App\Http\Controllers\ProductsController::class, 'show'])->middleware('auth');

Route::get('/create_product', function(){
    return view('admin.create_product');
})->middleware('auth');

Route::get('/product_delete/{id}',[App\Http\Controllers\ProductsController::class, 'destroy'])->middleware('auth');

Route::get('/product_create',[App\Http\Controllers\ProductsController::class, 'create'])->middleware('auth');

Route::post('/product_submit',[App\Http\Controllers\ProductsController::class, 'store'])->middleware('auth');

Route::get('/edit-categories', function(){
    return view('admin.edit-categories');
})->middleware('auth');


//categories

Route::get('/categories',[App\Http\Controllers\CategoryController::class, 'manageCategory'])->middleware('auth');

Route::get('/category_delete/{id}',[App\Http\Controllers\CategoryController::class, 'destroy'])->middleware('auth');

Route::post('/category_submit',[App\Http\Controllers\CategoryController::class, 'store'])->middleware('auth');

Route::get('/add_categories', function(){
    return view('admin.add_categories');
})->middleware('auth');

//sub_catergories

Route::get('/sub_categories',[App\Http\Controllers\SubCategoryController::class, 'allSubCategory'])->middleware('auth');

Route::get('/add_Sub_Categories',[App\Http\Controllers\SubCategoryController::class, 'showCategory'])->middleware('auth');


Route::get('/sub_category_delete/{id}',[App\Http\Controllers\SubCategoryController::class, 'destroy'])->middleware('auth');


Route::post('/subCategory_submit',[App\Http\Controllers\SubCategoryController::class, 'store'])->middleware('auth');
