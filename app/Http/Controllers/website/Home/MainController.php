<?php

namespace App\Http\Controllers\website\Home;

use App\Models\Category;
use App\Models\Advertisment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    protected $model;
    protected $area;
    protected $category;    public function __construct(Advertisment $model , Category $category  )
    {
        $this->model = $model;
        $this->category = $category;
    }
    public function main()
    {
        return view('welcome');
    }
    public function contact()
    {
        return view('contact');
    }
    public function about()
    {
        $currentLocale = app()->getLocale();
        return view('about',compact('currentLocale'));
    }
    public function terms()
    {
        $currentLocale = app()->getLocale();
        return view('terms',compact('currentLocale'));
    }
    public function home(Request $request)
    {
        $data = $this->model->with('user')->where('is_active',true)->filter($request->all())->latest()->paginate(6);
        $categroy = $this->category->all();
        return view('advertisment.index',['data'=>$data,'categories'=>$categroy]);
    }
}
