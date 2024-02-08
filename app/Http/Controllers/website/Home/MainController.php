<?php

namespace App\Http\Controllers\website\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main()
    {
        return view('welcome');
    }
}
