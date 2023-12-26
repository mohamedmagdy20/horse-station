<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CartRequest;
use App\Http\Resources\Api\CartResource;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CartController extends Controller
{
    protected $model;
    public function __construct(CartItem $model)
    {
        $this->model = $model;
    }
    public function index(Request $request)
    {
        App::setLocale($request->header('locale'));
        $sign  = $request->sign;
        $data = $this->model->where('user_id',auth()->user()->id)->with('product')->latest()->simplePaginate(7);
        return response()->json([
            'status'=>200,
            'data'=>CartResource::collection($data->map(function ($product) use ($sign) {
                $product->product->price = $product->getPriceInCurrency($sign,  $product->product->price);
                return $product;
                })),
            'subtotal'=>$this->sum('total'),
            'deliver'=> 5,
            'total'=>($this->sum('total') +  5),
            'message'=>'Success'
        ]);
    }

    public function store(CartRequest $request)
    {
        $data = $request->validated();
        $this->model->firstOrCreate($data + ['user_id'=>auth()->user()->id]);
        return response()->json(
            ['status'=>201
            ,'message'=>'Created Successfully',
            'data'=>NULL        
        ]);
    }

    public function addQuantity(Request $request)
    {
        $data = $this->model->findOrFail($request->id);
        $data->increment('qantity',1);
        $data->save();
        return response()->json([
            'data'=>NULL,
            'status'=>200,
            'message'=>'success'
        ]);
    }
    public function decQuantity(Request $request)
    {
        $data = $this->model->findOrFail($request->id);
        $data->decrement('qantity',1);
        $data->save();
        return response()->json([
            'data'=>NULL,
            'status'=>200,
            'message'=>'success'
        ]);
    }
}
