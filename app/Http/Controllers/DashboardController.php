<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::count();
        $categories = Category::count();
        $user = User::count();
        return view('dashboard.index', compact('posts', 'categories', 'user'));
    }
}
