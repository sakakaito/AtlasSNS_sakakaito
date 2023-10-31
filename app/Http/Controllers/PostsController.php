<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostsController extends Controller
{
    //
    public function index(){
        return view('posts.index');
    }

    //public function create(Request $request ){
        //$input = $request->only('user_id','post');
        //dd($input);
    //}


    public function store(Request $request){
       // dd($request);
       $id = Auth::id();
        //バリデーション
        $request->validate([
            'post' => 'required|min:1|max:150',
        ]);
        //$input = $request->only('user_id','post');
        Post::create([
           'user_id' => $id,
            'post' => $request->post,
        ]);
        // $post =  new Post;
        // $post->user_id = $id;
        // $post->post = $request->post;
        // $post->save();
        return back();
    }
}
