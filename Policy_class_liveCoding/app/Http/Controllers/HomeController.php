<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the public articles index with filter and search.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function publicIndex(Request $request)
    {
        $search = $request->query('search'); // Get the search query parameter
        $category = $request->query('category'); // Get the category query parameter

        $categories = Category::all(); // Fetch all categories for the filter dropdown

        // Base query for articles
        $articlesQuery = Article::query();

        // Apply search filter
        if ($search) {
            $articlesQuery->where('title', 'like', '%' . $search . '%');
        }

        // Apply category filter
        if ($category) {
            $articlesQuery->where('category_id', $category);
        }

        $articles = $articlesQuery->paginate(6); // Paginate the results

        return view('public.articles.index', compact('articles', 'categories', 'search', 'category'));
    }

    /**
     * Show a single article.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function publicShow($id)
    {
        $article = Article::findOrFail($id);
        return view('public.articles.show', compact('article'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
