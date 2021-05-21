<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index()
    {
        return view( 'post-overview', [
            'posts' => Post::where('user_id', '=', auth()->user()->id)->get(),
        ]);
    }

    public function create()
    {
        return view( 'post-detail', [
            'author' => auth()->user(), 
        ] );
    }

    public function edit($id)
    {
        return view( 'post-detail', [
            'post' => Post::find( $id ),
        ] );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->user_id = auth()->id();
        $post->content = $request->content;
        $post->save();

        return redirect('/post');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = auth()->id();
        $post->save();

        return redirect('/home');
    }

    public function delete(Request $request, $id)
    {
        $post = Post::find($id);

        DB::table('posts')->where('id', '=', $post->id)->delete();

        return redirect('/post');
    }


}
