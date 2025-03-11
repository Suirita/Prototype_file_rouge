<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::All();
        return view("admin.comment.index", compact("comments"));
    }

    /**
     * Display comments for a specific article.
     */
    public function indexByArticle(Article $article)
    {
        $comments = $article->comments;
        return view("admin.comment.indexByArticle", compact("comments", "article"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Implementation for creating a comment (not provided)
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view("admin.comment.show", compact("comment"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view("admin.comment.edit", compact("comment"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'content' => 'required',
        ]);

        $comment->update([
            'content' => $validated['content'],
        ]);


        return redirect()->route('comment.show',$comment)->with('success', 'Commentaire modifié avec succès.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $articleId)
    {
        // Validate the request
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        // Find the article
        $article = Article::findOrFail($articleId);

        // Create and save the comment
        $article->comments()->create([
            'content' => $request->content,
            'user_id' => auth()->id(), // Assuming the user is logged in
        ]);

        // Redirect back with a success message
        return redirect()
            ->route('public.public.show', $article->id)
            ->with('success', 'Your comment has been added!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()
            ->route('comment.index')
            ->with('success', 'Commentaire supprimé avec succès.');
    }

    public function destroyByArticle(Comment $comment)
    {
        $article = $comment->article;
        $comment->delete();

        return redirect()
            ->route('comment.indexByArticle', $article)
            ->with('success', 'Commentaire supprimé avec succès.');
    }
}
