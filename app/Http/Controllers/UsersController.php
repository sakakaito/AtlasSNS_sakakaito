<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(Request $request){
        $users = User::get();
        $keyword = $request->input('keyword');
    if(!empty($keyword)){
        $users = User::where('username','like','%'.$keyword.'%')->get();
    }else{
        $users = User::all();
    }
        return view('users.search',['users'=>$users,'keyword'=>$keyword]);
    }

    //フォロー機能
    public function follow(User $user){
        //ログイン中ユーザーを取得
        $loginUser=auth()->user();
       //フォローしているか
       $is_following=$loginUser->isFollowing($user->id);
        //フォローしていなければフォローする
        if(!$is_following){
            $loginUser->follow($user->id);
        }
        return redirect('/search');
    }
    // //フォロー解除機能
    public function unfollow(User $user)
    {
        $loginUser= auth()->user();
        // フォローしているか
        $is_following = $loginUser->isFollowing($user->id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $loginUser->unfollow($user->id);
            return back();
        }
    }
}
