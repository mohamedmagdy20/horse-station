<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Traits\FilesTrait;
use App\Http\Controllers\Controller;
use App\Models\Camp;

class CampController extends Controller
{
    use FilesTrait;
    public $model;
    public function __construct(Camp $model)
    {
        $this->model =$model;
    }
    public function index()
    {
        $data = $this->model->all();
        return view('dashboard.camps.index',['data'=>$data]);
    }
    public function update(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        $camp = Camp::findOrFail($id);
        $camp->status = $status;
        $camp->save();
    }


    public function toggleActive(Request $request)
    {
        $data = $this->model->withTrashed()->find($request->id);
        if($data->is_active == false)
        {
            $data->is_active = true;
            $data->save();

            // Send Notification For Abrove //

        }else{
            $data->is_active = false;
            $data->save();
        }
        return response()->json([
            'status'=>true,
            'message'=>'Success'
        ]);
    }
}
