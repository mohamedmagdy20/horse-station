<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertismentDetailsResource;
use App\Http\Resources\AdvertismentResource;
use App\Models\Advertisment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AdvertismentController extends Controller
{
    //
    protected $model;
    public function __construct(Advertisment  $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {
        App::setLocale($request->header('locale'));
        $data  = $this->model->filter($request->all())->where('is_active',true)->latest()->simplePaginate(7);
        $sign = $request->sign;
        return response()->json([
            'data'=> AdvertismentResource::collection($data->map(function ($ads) use ($sign) {
                $ads->price = $ads->getPriceInCurrency($sign , $ads->price);
                return $ads;
            })),
            'status'=>200,
            'message'=>'Success'
        ]);
    }

    public function featuredAds(Request $request)
    {
        App::setLocale($request->header('locale'));
        $data  = $this->model->where('ads_type','fixed')->where('is_active',true)->take(5)->latest()->get();
        $sign = $request->sign;
        return response()->json([
            'data'=> AdvertismentResource::collection($data->map(function ($ads) use ($sign) {
                $ads->price = $ads->getPriceInCurrency($sign , $ads->price);
                return $ads;
            })),
            'status'=>200,
            'message'=>'Success'
        ]);
    }

    public function show(Request $request ,$id)
    {
        App::setLocale($request->header('locale'));

        $data = $this->model->find($id);
        $data['price'] = $data->getPriceInCurrency($request->sign , $data->price);
        return response()->json([
            'data'=> new AdvertismentDetailsResource($data),
            'status'=>200,
            'message'=>'Success'
        ]);
   
    }
}

