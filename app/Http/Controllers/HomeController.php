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

    public function product(Request $request)
    {
        $data['categories'] = Cache::remember('categories.all', 3600, fn() => Category::all());
        $data['products']   = Product::paginate(16);

        if ($request->expectsJson()) {
            return response()->json([
                'html'     => view('products._card_list', ['products' => $data['products']])->render(),
                'nextPage' => $data['products']->nextPageUrl(),
            ]);
        }

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

        if ($request->expectsJson()) {
            return response()->json([
                'html'     => view('articles._card_list', ['articles' => $articles, 'skip_first' => $request->input('page', 1) == 1])->render(),
                'nextPage' => $articles->nextPageUrl(),
            ]);
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

    public function privacy()
    {
        return $this->staticPage('pages.privacy');
    }

    public function terms()
    {
        return $this->staticPage('pages.terms');
    }

    public function faq()
    {
        return $this->staticPage('pages.faq');
    }

    public function contact()
    {
        // Contact page still renders fresh (may have dynamic elements like maps)
        return view('pages.contact');
    }

    /**
     * Return a static page with aggressive HTTP caching headers.
     * Content is cached for 7 days in browser, 30 days on CDN/proxy.
     */
    private function staticPage(string $view): \Illuminate\Http\Response
    {
        $html = Cache::remember('static_page.' . $view, now()->addDays(30), fn() =>
            view($view)->render()
        );

        return response($html)
            ->header('Content-Type', 'text/html; charset=UTF-8')
            ->header('Cache-Control', 'public, max-age=604800, s-maxage=2592000, stale-while-revalidate=86400')
            ->header('Vary', 'Accept-Encoding');
    }
}
