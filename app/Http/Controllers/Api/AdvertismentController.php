<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AdvertismentRequest;
use App\Http\Resources\AdsFavResourse;
use App\Http\Resources\AdvertismentDetailsResource;
use App\Http\Resources\AdvertismentResource;
use App\Http\Traits\FilesTrait;
use App\Models\AdsFavourite;
use App\Models\Advertisment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AdvertismentController extends Controller
{
    use FilesTrait;
    protected $model;
    protected $adsFav;

    public function __construct(Advertisment  $model , AdsFavourite $adsFav)
    {
        $this->model = $model;
        $this->adsFav = $adsFav;
    }

    public function index(Request $request)
    {
        if($request->header('locale'))
        {
            App::setLocale($request->header('locale'));
        }else{
            App::setLocale('ar');
        }
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
       
        if($request->header('locale'))
        {
            App::setLocale($request->header('locale'));
        }else{
            App::setLocale('ar');
        }
        $data  = $this->model->where('ads_type','special')->where('is_active',true)->take(5)->latest()->get();
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

        if($request->header('locale'))
        {
            App::setLocale($request->header('locale'));
        }else{
            App::setLocale('ar');
        }
        $data = $this->model->find($id);
        $data['price'] = $data->getPriceInCurrency($request->sign , $data->price);
        return response()->json([
            'data'=> new AdvertismentDetailsResource($data),
            'status'=>200,
            'message'=>'Success'
        ]);
   
    }


    public function store(AdvertismentRequest $request){
        $data = $request->validated();
        try{
            if($request->hasFile('images'))
            {
                $dataImage = [];
                foreach($request->images as $image)
                {
                    $dataImage [] = $this->saveFile($image , config('filepath.ADVERTISMENT_PATH'));
                }
                $data['images'] = $dataImage;
            }
    
            if($request->hasFile('videos'))
            {
                $dataVideo = [];
                foreach($request->videos as $video)
                {
                    $dataImage [] = $this->saveFile($video , config('filepath.VIDEOS_PATH'));
                }
                $data['videos'] = $dataVideo;
            }
    
            $data['user_id'] = auth()->user()->id;
            $ads = $this->model->create($data);
            
            // Payment Check Out //

            
            return response()->json([
                'data'=> new AdvertismentDetailsResource($ads),
                'status'=>200,
                'message'=>'Success'
            ]);
            
        }catch(Exception $e)
        {
            return response()->json([
                'data'=> NUll,
                'status'=>400,
                'message'=>$e->getMessage()
            ],400);
        }
        
    }

    // public function getFavAds()
    // {
    //     $data = $this->adsFav->with('advertisment')->where('user_id',auth()->user()->id)->latest()->simplePaginate(7);   
    //     return response()->json([
    //         'data'=> AdsFavResourse::collection($data),
    //         'status'=>200,
    //         'message'=>'Success'
    //     ],200);
    // }

    public function adsFav(Request $request)
    {
        $this->adsFav->firstOrCreate([
            'advertisment_id'=>$request->advertisment_id,
            'user_id'=>auth()->user()->id
        ]);
        return response()->json([
            'data'=> NUll,
            'status'=>200,
            'message'=>'Advertisment Added to Favourite'
        ]);
    }


    public function deleteFav($id)
    {
        $this->adsFav->findOrFail($id)->delete;
        return response()->json([
            'data'=> NUll,
            'status'=>200,
            'message'=>'Advertisment Removed From Favourite'
        ]);
    }


}

