<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function add_post()
    {
        return view('add_post');
    }

    public function editpost(Request $request)
    {
        $key=$request->id;
        $post = Post::find($key);
        return view('editpost')->with('post',$post);
    }
    public function post(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description'=> 'required',
    ]);

    $data = new post();
    $data->title = $request->input('title');
    $data->content_text = $request->input('description');
    $data->user_id = session()->get('user')['id'];
    $data->save();
    return redirect('/dashboard')->with('success', 'Registration successful!');
}


public function showpost(Request $request){
    $userId = session()->get('user')['id'];
    $posts = post::where('user_id', $userId)->get();
    return view('show', ['posts' => $posts]);
}

public function deletepost($id)
{
    $post = post::find($id);
    $post->delete();
    return redirect('/show_post');
}

public function edit(Request $request, $id) {
    $request->validate([    
        'title' => 'required',       
        'content_text' => 'required',
    ]);
    $user = session()->get('user');
    $user_id = $user['id'];
    $post = Post::where('id', $id)->where('user_id', $user_id)->first();
    $post->title = $request->title;   
    $post->content_text = $request->content_text;
    $post->save();
    return redirect('/show_post');
}
}

