<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc') ->paginate(6);
        return view("post/index", compact('posts'));
    }
    public function show(Post $post)
    {
        return view("post/show", compact('post'));
    }
    public function create()
    {
        return view("post/create");
    }
    public function store()
    {
        $this->validate(request(), [
            'title' => 'required|string|max:100|min:5',
            'content' => 'required|string|min:10'
        ]);
        $post = Post::create(request(['title', 'content']));
        return;
    }
    public function  edit()
    {
        return view("post/edit");
    }
    public function  update()
    {
        return;
    }
    public function  delete()
    {
        return;
    }

}
