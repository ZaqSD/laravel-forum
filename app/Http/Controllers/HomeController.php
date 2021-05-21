<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(Post $post)
    {
        return view( 'home', [
            'user' => auth()->user(),
            'posts' => Post::all()->sortByDesc('created_at'),
        ]);
    }
}
