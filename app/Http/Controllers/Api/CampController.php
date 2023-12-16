<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CampDetailsResource;
use App\Models\Camp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CampController extends Controller
{
    //
    protected $model;
    public function __construct(Camp  $model)
    {
        $this->model = $model;
    }

    public function show(Request $request ,$id)
    {
        App::setLocale($request->header('locale'));

        $data = $this->model->find($id);
        $data['price'] = $data->getPriceInCurrency($request->sign , $data->price);
        return response()->json([
            'data'=> new CampDetailsResource($data),
            'status'=>200,
            'message'=>'Success'
        ]);
   
    }


}
