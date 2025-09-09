<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['banners'] = Banner::all();
        $data['categories'] = Category::all();
        $data['productUp'] = Product::where('product_up', true)->get();
        $data['productForBussines'] = Product::where('category_id', 1)->get();
        $data['adminPanel'] = Product::where('category_id', 2)->get();
        return view('index', $data);
    }
    public function detail($slug)
    {
        $data['product'] = Product::where('slug',$slug)->first();
        return view('detail',$data);
    }
}
