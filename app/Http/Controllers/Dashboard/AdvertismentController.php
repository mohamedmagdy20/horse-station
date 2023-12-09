<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use Illuminate\Http\Request;

class AdvertismentController extends Controller
{
    public $model;
    public function __construct(Advertisment $model)
    {
        $this->model =$model;
    }

    public function index()
    {
        $data = $this->model->withTrashed()->get();
        return view('dashboard.advertisments.index',['data'=>$data]);
    }


    
    public function show($id)
    {
        $data = $this->model->withTrashed()->find($id);
        return view('dashboard.advertisments.show',['data'=>$data]);
    }


}
