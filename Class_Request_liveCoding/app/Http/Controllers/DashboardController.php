<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    

    public function index(){

        $totalUsers = User::count();
        $totalComments = Comment::count();
        $totalCategories = Category::count();
        $totalArticles = Article::count();
        return view('admin.dashboard',
        compact('totalUsers','totalComments','totalCategories','totalArticles'));
    }
}

