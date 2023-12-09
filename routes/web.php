<?php

use App\Http\Controllers\Dashboard\CampController;
use App\Http\Controllers\Dashboard\Admin\AdminController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CountryController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PlanController;
use App\Http\Controllers\Dashboard\ProductController;

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

    Route::group(['prefix'=>'country','controller'=>CountryController::class],function(){
        Route::get('/','index')->name('admin.country.index');
        Route::get('edit/{id}','edit')->name('admin.country.edit');
        Route::get('delete/{id}','delete')->name('admin.country.delete');
        Route::post('update/{id}','update')->name('admin.country.update');
    });

    Route::group(['prefix'=>'category','controller'=>CategoryController::class],function(){
        Route::get('/','index')->name('admin.category.index');
        Route::get('create','create')->name('admin.category.create');
        Route::get('edit/{id}','edit')->name('admin.category.edit');
        Route::get('delete/{id}','delete')->name('admin.category.delete');
        Route::post('update/{id}','update')->name('admin.category.update');
        Route::post('store','store')->name('admin.category.store');
    });

    Route::group(['prefix'=>'plan','controller'=>PlanController::class],function(){
        Route::get('/','index')->name('admin.plan.index');
        Route::get('create','create')->name('admin.plan.create');
        Route::get('edit/{id}','edit')->name('admin.plan.edit');
        Route::get('delete/{id}','delete')->name('admin.plan.delete');
        Route::post('update/{id}','update')->name('admin.plan.update');
        Route::post('store','store')->name('admin.plan.store');
    });
    Route::group(['prefix'=>'admin','controller'=>AdminController::class],function(){
        Route::get('/','index')->name('admin.admin.index');
        Route::get('create','create')->name('admin.admin.create');
        Route::get('edit/{id}','edit')->name('admin.admin.edit');
        Route::get('delete/{id}','delete')->name('admin.admin.delete');
        Route::post('update/{id}','update')->name('admin.admin.update');
        Route::post('store','store')->name('admin.admin.store');
    });
    Route::group(['prefix'=>'products','controller'=>ProductController::class],function(){
        Route::get('/','index')->name('admin.product.index');
        Route::get('create','create')->name('admin.product.create');
        Route::get('edit/{id}','edit')->name('admin.product.edit');
        Route::get('delete/{id}','delete')->name('admin.product.delete');
        Route::post('update/{id}','update')->name('admin.product.update');
        Route::post('store','store')->name('admin.product.store');
    });
    Route::group(['prefix'=>'camps','controller'=>CampController::class],function(){
        Route::get('/','index')->name('admin.camp.index');
        Route::post('update-status','update')->name('admin.camp.update');
    });
});
Route::get('/', function () {
    return view('welcome');
});
