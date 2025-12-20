<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;



Route::get('/' ,[HomeController::class, 'home'])->name('home');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');


Route::get('/dashboard' ,[HomeController::class, 'login_home'])->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])->
middleware('auth', 'admin')->name('admin/dashboard');

Route::get('view_category', [AdminController::class, 'view_category'])->
middleware('auth', 'admin')
->name('view_category');

Route::post('add_category', [AdminController::class, 'add_category'])->
middleware('auth', 'admin')->name('add_category');

Route::delete('delete_category/{id}', [AdminController::class, 'delete_category'])->
middleware('auth', 'admin')->name('delete_category');

Route::get('edit_category/{id}', [AdminController::class, 'edit_category'])
->middleware('auth', 'admin')
 ->name('edit_category');;

Route::put('edit_category/{id}', [AdminController::class, 'update_category'])
    ->middleware('auth', 'admin')
    ->name('update_category');

Route::get('add_product', [AdminController::class, 'add_product'])
->middleware('auth', 'admin')
 ->name('add_product');
 
Route::post('upload_product', [AdminController::class, 'upload_product'])
->middleware('auth', 'admin')
 ->name('upload_product');

Route::get('view_product', [AdminController::class, 'view_product'])
->middleware('auth', 'admin')
 ->name('view_product');

 Route::delete('delete_product/{id}', [AdminController::class, 'delete_product'])->
middleware('auth', 'admin')->name('delete_product');

Route::get('edit_product/{id}', [AdminController::class, 'edit_product'])
    ->middleware('auth', 'admin')
    ->name('edit_product');

Route::put('update_product/{id}', [AdminController::class, 'update_product'])
    ->middleware('auth', 'admin')
    ->name('update_product');


Route::get('product_search', [AdminController::class, 'product_search'])
    ->middleware('auth', 'admin')
    ->name('product_search');


Route::get('product_details/{id}', [HomeController::class, 'product_details'])
  ->name('product_details');


Route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->middleware(['auth', 'verified'])
  ->name('add_cart');


Route::get('my_cart', [HomeController::class, 'my_cart'])->middleware(['auth', 'verified'])
  ->name('my_cart');

 Route::delete('delete_cart/{id}', [HomeController::class, 'delete_cart'])->middleware(['auth', 'verified'])
 ->name('delete_cart');

 Route::post('confirm_order', [HomeController::class, 'confirm_order'])->middleware(['auth', 'verified'])
 ->name('confirm_order');

Route::get('view_order', [AdminController::class, 'view_order'])
->middleware('auth', 'admin')
 ->name('view_order');

Route::get('on_the_way/{id}', [AdminController::class, 'on_the_way'])
->middleware('auth', 'admin')
 ->name('on_the_way');

Route::post('delivered/{id}', [AdminController::class, 'delivered'])
 ->name('delivered');

Route::get('print_pdf/{id}', [AdminController::class, 'print_pdf'])
->middleware('auth', 'admin')
 ->name('print_pdf');


Route::get('my_order', [HomeController::class, 'my_order'])->
middleware('auth', 'verified')->name('my_order');

Route::controller(HomeController::class)->group(function(){
    Route::get('stripe/', 'stripe');      
    Route::post('stripe', 'stripePost')->name('stripe.post');
});


Route::get('add_shop', [HomeController::class, 'add_shop'])
->name('add_shop');

Route::get('why', [HomeController::class, 'why'])
->name('why');


Route::get('testimonial', [HomeController::class, 'testimonial'])
->name('testimonial');

Route::get('add_contact', [HomeController::class, 'add_contact'])
->name('add_contact');



