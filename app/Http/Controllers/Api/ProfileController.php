<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertismentResource;
use App\Models\Advertisment;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    protected $model ;
    protected $advertisment ;

    public function __construct(User $model , Advertisment $advertisment){
        $this->model = $model;
        $this->advertisment = $advertisment;
    }

    public function advertisment(Request $request)
    {
        $activeAds = $this->advertisment->where('is_active',true)->notExpire()->where('user_id',auth()->user()->id)->latest()->simplePaginate(7);
        $pendingAds = $this->advertisment->where('is_active',false)->notExpire()->where('user_id',auth()->user()->id)->latest()->simplePaginate(7);
        $expire = $this->advertisment->expire()->where('user_id',auth()->user()->id)->latest()->simplePaginate(7);
        $sign = $request->sign;
        return response()->json([
            'data'=>[
                'active'=>AdvertismentResource::collection($activeAds->map(function ($ads) use ($sign) {
                    $ads->price = $ads->getPriceInCurrency($sign , $ads->price);
                    return $ads;
                })),
                'pending'=>AdvertismentResource::collection($pendingAds->map(function ($ads) use ($sign) {
                    $ads->price = $ads->getPriceInCurrency($sign , $ads->price);
                    return $ads;
                })),
                'expire'=>AdvertismentResource::collection($expire->map(function ($ads) use ($sign) {
                    $ads->price = $ads->getPriceInCurrency($sign , $ads->price);
                    return $ads;
                })),
            ] ,
            'status'=>200,
            'message'=>'Success'
        ]);
    }
}
