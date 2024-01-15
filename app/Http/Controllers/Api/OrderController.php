<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    protected $model;
    public function __construct(Order  $model)
    {
        $this->model = $model;
    }
    public function show(Request $request ,$id)
    {
        if($request->header('locale'))
        {
            App::setLocale($request->header('locale'));
        }else{
            App::setLocale('ar');
        }
        $data = Order::where('user_id',$id)->get(); ;
        if ($data) {
        //$data['total'] = $data->getPriceInCurrency($request->sign , $data->total);
        return response()->json([
            'data'=> $data,
            'status'=>200,
            'message'=>'Success'
        ]);
       }
    else
    {
     return response()->json(['data'=>null , 'status'=>404,'message'=>"Not Found"], 404);
    }
    }
}
