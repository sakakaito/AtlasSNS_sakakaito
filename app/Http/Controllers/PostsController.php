<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostsController extends Controller
{
    //
    public function index(){
        $posts = Post::get();
        $posts = Post::all();//postsテーブルのデータをすべて取得
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
            'post' => $request->post,//$request変数にpostを
        ]);
        // $post =  new Post;
        // $post->user_id = $id;
        // $post->post = $request->post;
        // $post->save();

        return back();


    }
    //編集機能
    public function update(Request $request, $id){
        $id = Auth::id();//ログイン中のユーザーIDを取得
        $id = $request->input('id');//name属性がidで指定されているフォームの値を変数で取得
        $edit = $request->input('edit-text');//name属性がedit-textで指定されているフォームの値を変数で取得

        Post::where('id',$id)->update([//Postsテーブルのidカラムがフォームから持ってきた$id変数の値と一致するレコードを選択する処理
            'post' => $edit //フォームから持ってきた$edit変数の値に更新
        ]);
        return back();
    }
    // public function update(Request $request,Post $post){
    //     $request->validate([
    //         'post' => 'required|min:1|max:150',
    //     ]);
    //     $post=$request->input('edit-text');
    //     $post->save();
    //     return back();
    // }
    // 削除機能

}
