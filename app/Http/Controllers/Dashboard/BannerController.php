<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Http\Resources\Api\BannerResource;
use App\Http\Traits\FilesTrait;
use App\Models\Banner;
use Exception;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    //
    use FilesTrait;
    public $model;
    public function __construct(Banner $model)
    {
        $this->model =$model;
    }
    public function index()
    {
        $data = $this->model->all();
        return view('dashboard.banners.index',['data'=>$data]);
    }
    public function create()
    {
       return view('dashboard.banners.create');
    }

    public function store(BannerRequest $request)
    {
        $data = $request->validated();
        try{
            if($request->hasFile('images'))
            {
                foreach($request->file('images') as $image)
                {
                    $fileName = $this->saveFile($image , config('filepath.BANNER_PATH'));
                    $this->model->create(['image'=>$fileName]);
                }
            }
            return redirect()->back()->with('success','Created');
        }catch(Exception $e)
        {
            return $e;
        }
    }

    public function edit($id)
    {
        
        $data  =$this->model->findOrFail($id);
        return view('dashboard.banners.edit',['data'=>$data]);
    }
    public function update(Request $request , $id)
    {
        // $data = $request->all();
        $banner = $this->model->findOrFail($id);
        try{
            if($request->hasFile('image'))
            {
                    $fileName = $this->updateFile($request->file('image'),$banner->image , config('filepath.BANNER_PATH'));
                    $banner->update(['image'=>$fileName]);
            }
            return redirect()->back()->with('success','Updated');
        }catch(Exception $e)
        {
            return $e;
        }
    }
    public function delete($id)
    {
        $data = $this->model->findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success','Deleted');
    }


    // Api //

    public function getAll(){
        $data = $this->model->all();
        return response()->json([
            'data'=>BannerResource::collection($data),
            'status'=>200,
            'message'=>'Success'
        ]);
    }
}
