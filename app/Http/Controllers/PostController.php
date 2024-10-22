<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $data = Post::all();
        $data = PostResource::collection($data)->resolve();
        return inertia('Post/Index', compact('data'));
    }

    public function create(){
        return inertia('Post/Create');
    }

    public function store(Request $request){
        Post::create($request->all());
        return redirect()->route('post.index');
    }

    public function show(Post $post){
        return inertia('Post/Show', compact('post'));
    }

    public function edit(Post $post){
        return inertia('Post/Edit', compact('post'));
    }
    public function update(Post $post, Request $request){
        $post->update($request->all());
        return redirect()->route('post.index');
    }
    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index');
    }

}
