<?php

namespace App\Http\Controllers\website\Home;

use App\Models\Category;
use App\Models\Advertisment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\website\ads;
use App\Models\Country;
use App\Models\Product;

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
        $categroy = category::all();
        $ads      = Advertisment::all();
        $products = Product::all();
        return view('welcome',compact( 'categroy','ads','products'));
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
        $product = Product::findOrFail($id);
        return view('advertisment.show',compact( 'product' ) );
    }
    public function create()
    {
        $categories = Category::all();
        $countries = Country::all();
        return view('advertisment.create', ['categories' => $categories, 'countries' => $countries]);
    }
    public function storeadd(Request $request)
    {
        $data = $request->all();
        $data['user_id']   = auth()->user()->id;
        if ($request->hasFile('images')) {
            if ($data['images'] !== null) {
                $oldImagePath = public_path('uploads/advertisments/') . $data['images'] ;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $newImage = $request->file('images');
            $newImageName = "advertisments-" . uniqid() . '.' . $newImage->getClientOriginalExtension();
            $newImage->move(public_path('uploads/advertisments/'), $newImageName);
            $data['images']  = $newImageName;
        }
        if ($request->hasFile('videos')) {
            if ($data['videos'] !== null) {
                $oldImagePath = public_path('uploads/advertisments/') . $data['videos'] ;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $newImage = $request->file('videos');
            $newImageName = "advertisments-" . uniqid() . '.' . $newImage->getClientOriginalExtension();
            $newImage->move(public_path('uploads/advertisments/'), $newImageName);
            $data['videos']  = $newImageName;
        }
        $ads = Advertisment::create($data);
        return redirect()->back()->with(['success' => 'Ads added succesfully !']);
        return $ads;
    }
}

