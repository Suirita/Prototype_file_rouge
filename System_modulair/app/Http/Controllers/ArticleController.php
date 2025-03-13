<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Services\ArticleService;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index()
    {
        $articles = Article::paginate(4);
        return view('admin.article.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.article.create', compact('categories', 'tags'));
    }

    public function store(ArticleRequest $request)
    {
        $articleData = $request->validated();
        $articleData['category_id'] = $request->category;
        $this->articleService->store($articleData);

        return redirect()->route('article.index')->with('success', 'Article créé avec succès.');
    }

    public function show(Article $article)
    {
        return view('admin.article.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.article.edit', compact('article', 'categories', 'tags'));
    }

    public function update(Request $request, Article $article)
    {
        $this->authorize('edit', $article);

        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id'
        ]);

        $this->articleService->update($article, $validated);

        return redirect()->route('article.index')->with('success', 'Article mis à jour avec succès.');
    }

    public function destroy(Article $article)
    {
        $this->articleService->destroy($article);
        return redirect()->route('article.index')->with('success', 'Article supprimé avec succès.');
    }
}
