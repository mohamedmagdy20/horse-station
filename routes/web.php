<?php

use App\Http\Controllers\Dashboard\Admin\AdminController;
use App\Http\Controllers\Dashboard\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('admin/login',[AdminController::class,'loginView'])->middleware('guest:admin')->name('admin.login.view');
Route::post('admin/login',[AdminController::class,'login'])->middleware('guest:admin')->name('admin.login');
Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function(){
    Route::get('/',[HomeController::class,'index'])->name('admin');
    Route::get('logout',[AdminController::class,'logout'])->name('admin.logout');

    
});
Route::get('/', function () {
    return view('welcome');
});
