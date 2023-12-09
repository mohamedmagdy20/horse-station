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
}
