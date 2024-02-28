<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostsController extends Controller
{
    //
    public function index(){
        // dd($posts);
        $login_id = Auth::id();
        $following_id = Auth::user()->follows()->pluck('followed_id');
        $posts = Post::with('user')->whereIn('user_id',$following_id)->orwhere('user_id',$login_id)->latest()->get();//postsテーブルのデータをすべて取得
        return view('posts.index',['posts'=>$posts]);//取得したデータをviewファイルに渡す。compact('post')でもいけそう
    }

    //public function create(Request $request ){
        //$input = $request->only('user_id','post');
        //dd($input);
    //}


    public function store(Request $request){//←フォームから送信されたデータを受け取り
       // dd($request);　デバック
       $id = Auth::id();//ログイン中のユーザーIDを取得
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
    //編集機能
    public function update(Request $request){
        // dd($request);
        //バリデーション処理
        $request->validate([
            'post' => 'required|min:1|max:150',
        ]);
        // $id = Auth::id();//ログイン中のユーザーIDを取得
        // dd($id);
        $post = $request->input('post');
        $id = $request->input('textId');
        // dd($id);
        Post::where('id',$id)->update([
            'post' => $post
        ]);
        // return redirect('posts.index');
        return back();
    }
    // 削除機能
    public function delete(Request $request){
        // dd($request);
        $id = $request->input('deleteId');
        // dd($id);
        Post::where('id',$id)->delete();
        return back();
    }

}
