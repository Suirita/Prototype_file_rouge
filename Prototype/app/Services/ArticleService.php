<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleService
{
    /**
     * Store a new article.
     */
    public function store($data)
    {
        $data['user_id'] = Auth::id();
        $article = Article::create($data);
        $article->tags()->attach($data['tags']);
        return $article;
    }

    /**
     * Update an existing article.
     */
    public function update($article, $data)
    {
        $article->update([
            'title' => $data['title'],
            'content' => $data['content'],
            'category_id' => $data['category'],
        ]);
        $article->tags()->sync($data['tags']);
        return $article;
    }

    /**
     * Delete an article.
     */
    public function destroy($article)
    {
        $article->delete();
    }
}
