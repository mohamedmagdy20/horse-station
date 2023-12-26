<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public $model;
    public function __construct(Address $model)
    {
        $this->model  = $model ;
    }

    public function index()
    {
        $data = $this->model->where('user_id',auth()->user()->id)->latest()->simplePaginate(7);
        return response()->json([
            'message'=>'Success',
            'data'=> AddressResource::collection($data),
            'status'=>200
        ]);
    }

    public function store(AddressRequest $request)
    {
        $data = $request->validated();
        $data['user_id']= auth()->user()->id;
        $this->model->firstOrCreate($data);
        return response()->json([
            'message'=>'Created',
            'data'=> NULL,
            'status'=>201
        ]);
    }
}
