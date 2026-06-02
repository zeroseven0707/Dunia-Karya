<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        // Cache static data — cleared when admin updates via model observer
        $data['tags']       = Cache::remember('tags.all', 3600, fn() => Tag::all());
        $data['banners']    = Cache::remember('banners.all', 3600, fn() => Banner::all());
        $data['categories'] = Cache::remember('categories.all', 3600, fn() => Category::all());

        $data['productUp']          = Cache::remember('products.featured', 300, fn() =>
            Product::where('product_up', true)->get()
        );
        $data['productForBussines'] = Cache::remember('products.business', 300, fn() =>
            Product::where('for_bussinees', true)->get()
        );
        $data['adminPanel']         = Cache::remember('products.admin_panel', 300, fn() =>
            Product::where('category_id', '01998f08-93cf-714e-9e96-e44fd87329ff')->get()
        );

        return view('index', $data);
    }

    public function product()
    {
        $data['categories'] = Cache::remember('categories.all', 3600, fn() => Category::all());
        $data['products']   = Product::paginate(16);
        return view('products.index', $data);
    }

    public function product_detail($slug)
    {
        $data['product'] = Cache::remember('product.' . $slug, 600, fn() =>
            Product::where('slug', $slug)->first()
        );
        $data['relatedProducts'] = Product::where('category_id', $data['product']->category_id)
            ->paginate(8);
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
        $article         = Article::where('slug', $slug)->firstOrFail();
        $relatedArticles = Article::where('id', '!=', $article->id)->latest()->take(3)->get();
        return view('articles.show', compact('article', 'relatedArticles'));
    }

    public function search(Request $request)
    {
        $query          = $request->input('q');
        $data['categories'] = Cache::remember('categories.all', 3600, fn() => Category::all());
        $data['products']   = Product::where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->paginate(16);
        return view('products.index', $data);
    }

    public function category($slug)
    {
        $category               = Category::where('slug', $slug)->firstOrFail();
        $data['categories']     = Cache::remember('categories.all', 3600, fn() => Category::all());
        $data['products']       = Product::where('category_id', $category->id)->paginate(16);
        $data['currentCategory'] = $category;
        return view('products.index', $data);
    }

    public function tag($slug)
    {
        $tag                = Tag::where('slug', $slug)->firstOrFail();
        $data['categories'] = Cache::remember('categories.all', 3600, fn() => Category::all());
        $data['products']   = Product::whereHas('tags', function ($q) use ($slug) {
            $q->where('slug', $slug);
        })->paginate(16);
        $data['currentTag'] = $tag;
        return view('products.index', $data);
    }

    public function privacy() { return view('pages.privacy'); }
    public function terms()   { return view('pages.terms'); }
    public function faq()     { return view('pages.faq'); }
    public function contact() { return view('pages.contact'); }
}
