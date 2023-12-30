<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductDetailsResource;
use App\Http\Resources\ProductFavouriteResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductFavourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProductController extends Controller
{
    protected $model;
    protected $favModel;

    public function __construct(Product  $model  , ProductFavourite $favModel)
    {
        $this->model = $model;
        $this->favModel = $favModel;
    }
    public function featuredProduct(Request $request)
    {
        
        if($request->header('locale'))
        {
            App::setLocale($request->header('locale'));
        }else{
            App::setLocale('ar');
        }
        $data  = $this->model->take(5)->latest()->simplePaginate(7);
        $sign = $request->sign;
        return response()->json([
            'data'=> ProductResource::collection($data->map(function ($product) use ($sign) {
            $product->price = $product->getPriceInCurrency($sign , $product->price);
            return $product;
            })),
            'status'=>200,
            'message'=>'Success'
        ]);
    }

    public function show(Request $request,$id)
    {

        if($request->header('locale'))
        {
            App::setLocale($request->header('locale'));
        }else{
            App::setLocale('ar');
        }
        $data = $this->model->findOrFail($id);
        $data['price'] = $data->getPriceInCurrency($request->sign , $data->price);
        return response()->json([
            'data'=> new ProductDetailsResource($data),
            'status'=>200,
            'message'=>'Success'
        ]);

    }


    public function favourite(Request $request)
    {
        
        if($request->header('locale'))
        {
            App::setLocale($request->header('locale'));
        }else{
            App::setLocale('ar');
        }
        $data  = $this->favModel->where('user_id',auth()->user()->id)->with('product')->latest()->simplePaginate(7);
        return response()->json([
            'data'=> ProductFavouriteResource::collection($data),
            'status'=>200,
            'message'=>'Success'
        ]);
    }

    public function addFav(Request $request)
    {
        $this->favModel->firstOrCreate([
            'product_id'=>$request->product_id,
            'user_id'=>auth()->user()->id
        ]);
        return response()->json([
            'data'=> NUll,
            'status'=>200,
            'message'=>'Product Added to Favourite'
        ]);
    }

    public function deleteFav($id)
    {
        $this->favModel->findOrFail($id)->delete;
        return response()->json([
            'data'=> NUll,
            'status'=>200,
            'message'=>'Product Removed From Favourite'
        ]);
    }



}



