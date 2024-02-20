<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

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
    $data->user_id = auth()->id();
    $data->save();
    return redirect('/dashboard');
}


public function showpost(Request $request){
    $userId = auth()->id(); 
    $roleCode = auth()->user()->role_code;
    if($roleCode === 'admin') {
        $posts = Post::all();
    } else {
        $posts = Post::where('user_id', $userId)->get();
    }
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
    $userId = auth()->id(); 
    $roleCode = auth()->user()->role_code;
    if ($roleCode === 'admin') {
        $post = Post::find($id);
    } else {
        $post = Post::where('id', $id)->where('user_id', $userId)->first();
    }
    $post->title = $request->title;   
    $post->content_text = $request->content_text;
    $post->save();
    return redirect('/show_post');
}


public function updatestatus(Request $request, $id) {
    $roleCode = auth()->user()->role_code;
    if ($roleCode === 'admin') {
        $post = Post::find($id);
        $post->status = $post->status == 1 ? 2 : 1;
        $post->save();
        return redirect('/show_post');
    } else {
        return redirect('/show_post');
    }
   
}
}


























// public function showpost(Request $request){
//     $userId = session()->get('user')['id'];
//     $user = User::find($userId);
//     $roleCode = $user->role_code;
//     if($roleCode === 'admin') {
//         $posts = Post::all();
//     } else {
//         $posts = Post::where('user_id', $userId)->get();
//     }
//     return view('show', ['posts' => $posts]);
// }