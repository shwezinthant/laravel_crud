<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);
        return view('posts.index', compact('posts'));   //posts lists
    }

    public function create()
    {
        return view('posts.create');    //post create UI
    }
    public function store(Request $request)
    {
        //  posts create action
        // dd($request->all());

        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        // dd("Success");
        return redirect('/posts');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $post = Post::find($id);
        // dd($post->id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        Post::find($id)->update([
            'title' => $request->title,
            'content' => $request->content
        ]);
        return redirect('/posts')->with('successAlert', 'You have successful updated');
    }

    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect('/posts')->with('successAlert', 'You have successful delete');
    }
}