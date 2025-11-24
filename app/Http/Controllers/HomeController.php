<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['tags'] = Tag::all();
        $data['banners'] = Banner::all();
        $data['categories'] = Category::all();
        $data['productUp'] = Product::where('product_up', true)->get();
        $data['productForBussines'] = Product::where('for_bussinees', true)->get();
        $data['adminPanel'] = Product::where('category_id', '01998f08-93cf-714e-9e96-e44fd87329ff')->get();
        return view('index', $data);
    }
    public function product()
    {
        $data['categories'] = Category::all();
        $data['products'] = Product::paginate(16);
        return view('products.index', $data);
    }
    public function product_detail($slug)
    {
        $data['product'] = Product::where('slug', $slug)->first();
        $data['relatedProducts'] = Product::where('category_id', $data['product']->category_id)->paginate(8);
        return view('products.show', $data);
    }
    public function article(Request $request)
    {
        $query = $request->input('q');
        if ($query) {
            $articles = Article::where('title', 'like', "%{$query}%")
                ->orWhere('content', 'like', "%{$query}%")
                ->latest()
                ->paginate(10);
        } else {
            $articles = Article::latest()->paginate(10);
        }
        return view('articles.index', compact('articles'));
    }
    public function article_detail($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $relatedArticles = Article::where('id', '!=', $article->id)->latest()->take(3)->get();

        return view('articles.show', compact('article', 'relatedArticles'));
    }
    public function search(Request $request)
    {
        $query = $request->input('q');
        $data['categories'] = Category::all();
        $data['products'] = Product::where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->paginate(16);
        
        return view('products.index', $data);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $data['categories'] = Category::all();
        $data['products'] = Product::where('category_id', $category->id)->paginate(16);
        $data['currentCategory'] = $category;

        return view('products.index', $data);
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $data['categories'] = Category::all();
        $data['products'] = Product::whereHas('tags', function($q) use ($slug) {
            $q->where('slug', $slug);
        })->paginate(16);
        
        $data['currentTag'] = $tag;

        return view('products.index', $data);
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
