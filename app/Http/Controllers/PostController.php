<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Validator;

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
    public function store(Request $request)
    {
        if($request ->isMethod("POST")) { // 验证
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:100|min:5',
                'content' => 'required|string|min:10'
            ], [
                'required' => ':attribute必须填写',
                'max' => ':attribute最大字符不超过100',
                'min' => ':attribute最小字符不低于5'
            ], [
                'title' => '标题',
                'content' => '内容'
            ]);
            if($validator ->fails()) { //逻辑
                return redirect('posts/create')
                        ->withErrors($validator)
                        ->withInput();
            }
            $data = $request ->all();
            if(Post::create($data)) { //渲染
                return redirect('posts');
            } else {
                return redirect() ->back();
            }
        }
        return view('post.create');
    }
    public function edit(Post $post)
    {
        return view("post/edit", compact('post'));
    }
    public function update(Request $request, Post $post)
    {
        if($request ->isMethod("PUT")) { // 验证
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:100|min:5',
                'content' => 'required|string|min:11'
            ], [
                'required' => ':attribute必须填写',
                'max' => ':attribute最大字符不超过100',
                'min' => ':attribute最小字符不低于5'
            ], [
                'title' => '标题',
                'content' => '内容'
            ]);
            if($validator ->fails()) { //逻辑
                return redirect("posts/{$post ->id}/edit")
                    ->withErrors($validator)
                    ->withInput();
            }
            $post ->title = $request->input('title');
            $post ->content = $request->input('content');
            $post ->save();
            return redirect("posts/{$post ->id}");
        }
    }
    public function delete(Post $post)
    {
        // 用户验证
        $post->delete();
        return redirect("/posts");
    }
    public function imageUpload(Request $request)
    {
        $path = $request ->file('wangEditorH5File') ->store(md5(time()));
        return asset('storage/'.$path);
    }
}
