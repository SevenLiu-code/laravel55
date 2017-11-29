<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc') ->get();
        return view("post/index", compact($posts));
    }
    public function show()
    {
        return view("post/show");
    }
    public function create()
    {
        return view("post/create");
    }
    public function store()
    {
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
