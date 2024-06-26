<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
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
// Route::get('home', function () {
//     return view('home');
// });

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/addItem', [OrderController::class, 'addItem'])->name('order.addItem');

// Profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/updateOrder', [OrderController::class, 'updateOrder'])->name('order.update');
Route::get('/deleteOrder/{id}', [OrderController::class, 'deleteOrder'])->name('order.delete');

// Admin
Route::get('/adminMenu', [AdminController::class, 'index'])->middleware('can:isAdmin')->name('adminMenu');
Route::post('/createItem', [ItemController::class, 'createItem'])->name('item.create');
Route::post('/updateItem', [ItemController::class, 'updateItem'])->name('item.update');
Route::get('/deleteItem/{id}', [ItemController::class, 'deleteItem'])->name('item.delete');
