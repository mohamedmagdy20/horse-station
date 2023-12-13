<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductDetailsResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProductController extends Controller
{
    protected $model;
    public function __construct(Product  $model)
    {
        $this->model = $model;
    }
    public function featuredProduct(Request $request)
    {
        App::setLocale($request->header('locale'));
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
        App::setLocale($request->header('locale'));

        $data = $this->model->findOrFail($id);
        $data['price'] = $data->getPriceInCurrency($request->sign , $data->price);
        return response()->json([
            'data'=> new ProductDetailsResource($data),
            'status'=>200,
            'message'=>'Success'
        ]);

    }
}



