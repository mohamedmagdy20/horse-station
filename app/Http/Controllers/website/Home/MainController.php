<?php

namespace App\Http\Controllers\website\Home;

use App\Models\Category;
use App\Models\Advertisment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;

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
    public function show($id)
    {
        $data = Advertisment::with('adsImage')->with('user')->with('Area')->with('Category')->findOrFail($id);
        // return $data->adsImage;
        $relatedData =  Advertisment::where('type',$data->type)->get();
        $currentLocale = app()->getLocale();
        return view('advertisment.show',['data'=>$data,'relatedData'=>$relatedData,'currentLocale'=>$currentLocale]);
    }
    public function create()
    {
        $categories = Category::all();
        $countries  = Country::all();
        return view('advertisment.create',['categories'=>$categories,'countries'=>$countries]);
    }

}
