<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        //ユーザーテーブルの全情報を取得
        // $userIcons = User::get();
        //ログインしているユーザーがフォローしている人のID
        $following_id = Auth::user()->follows()->pluck('followed_id');
        $userIcons = User::whereIn('id',$following_id)->get();
        // dd($userIcons);
        $posts = Post::with('user')->whereIn('user_id',$following_id)->latest()->get();
        // dd($posts);
        
        return view('follows.followList',['posts'=>$posts,'userIcons'=>$userIcons]);
    }
    public function followerList(){
        $followed_id = Auth::user()->followers()->pluck('following_id');
        $userIcons = User::whereIn('id',$followed_id)->get();
        // dd($userIcons);
        $posts = Post::with('user')->whereIn('user_id',$followed_id)->latest()->get();
        // dd($posts);
        return view('follows.followerList',['posts'=>$posts,'userIcons'=>$userIcons]);
    }

}
