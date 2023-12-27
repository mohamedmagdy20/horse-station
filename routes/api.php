<?php

use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\AdvertismentController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\CampController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController as ApiCategoryController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Dashboard\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public Route //
Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);
Route::post('verify',[AuthController::class,'verify']);
Route::post('resend',[AuthController::class,'resend']);


Route::get('countries',[CountryController::class,'index']);
Route::get('main-category',[CategoryController::class,'getMainCategory']);
Route::get('featured-product',[ProductController::class,'featuredProduct']);
Route::get('featured-advertisment',[AdvertismentController::class,'featuredAds']);
Route::get('advertisments',[AdvertismentController::class,'index']);
Route::get('get-subcategory/{id}',[ApiCategoryController::class,'getSubCategory']);
Route::get('categories/{id}',[ApiCategoryController::class,'getCategoriesById']);
Route::get('product/{id}',[ProductController::class,'show']);
Route::get('advertisment/{id}',[AdvertismentController::class,'show']);
Route::get('camp/{id}',[CampController::class,'show']);
Route::post('change-password',[AuthController::class,'forgetPassword']);

Route::get('search',[CategoryController::class,'search']);

// Protected Route
Route::group(['middleware'=>'auth:sanctum'],function(){
    Route::delete('logout',[AuthController::class,'logout']);
    Route::post('edit-profile',[AuthController::class,'EditProfile']);
    Route::post('create-advertisment',[AdvertismentController::class,'store']);

    Route::group(['prefix'=>'favourite/advertisments','controller'=>AdvertismentController::class],function(){
        Route::get('/','getFavAds');
        Route::post('create','adsFav');
        Route::delete('delete/{id}','deleteFav');
    });

    Route::group(['prefix'=>'favourite/product','controller'=>ProductController::class],function(){
        Route::get('/','favourite');
        Route::post('create','addFav');
        Route::delete('delete/{id}','deleteFav');
    });

    
    Route::group(['prefix'=>'camps','controller'=>CampController::class],function(){
        Route::get('get-levels','getLevelByCamp');
        Route::get('get-sports','getSportByCamp');
        Route::post('register','store');
    });

    Route::group(['prefix'=>'cart','controller'=>CartController::class],function(){
        Route::get('/','index');
        Route::post('store','store');
        Route::get('increment','addQuantity');
        Route::get('decrement','decQuantity');         
    });

    Route::group(['prefix'=>'address','controller'=>AddressController::class],function(){
        Route::get('/','index');
        Route::post('store','store');
        Route::delete('delete','delete');
      });

    Route::get('profile/advertisment',[ProfileController::class,'advertisment']);

});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
