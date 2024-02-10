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
    public function another($id){
        // dd($id);
        //リンク元のユーザー情報を取得
        $user = User::find($id);
        // dd($user->posts);
        // dd($user);
        return view('users.anotherprofile',['user'=>$user]);
    }
    //profile更新機能
    public function profileupdate(Request $request){
        //バリデーション
        $request->validate([
            'username' => 'required|min:2|max:12',
            'mail' => 'required|email|unique:users|min:5|max:40',
            'password' => 'required|alpha_num|min:8|max:20|confirmed',
            'password_confirmation' => 'required|alpha_num|min:8|max:20|',
            'bio' => 'max:150',
            'icon_image' => 'image|mines:png,jpg,gif,bmp,svg'
        ]);
        $id = $request->input('id');
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');
        // $passwordConfirm = $request->input('password_confirm');
        $bio = $request->input('bio');
        $iconImage = $request->file('icon_image')->getClientOriginalName();
        $request->file('icon_image')->storeAs('public/images',$iconImage);
        User::where('id',$id)->update([
            'id' => $id,
            'username' => $username,
            'mail' => $mail,
            'password' => bcrypt($password),
            'bio' => $bio
        ]);
        return redirect('/top');
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
        return back();
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
    //フォロー数の表示
    public function show(User $user){
        // dd($user);
        $login_user = auth()->user();
        $is_following = $login_user->isFollowing($user->id);
        $is_followed = $login_user->isFollowed($user->id);
        $follow_count = $user->getFollowCount($user->id);
        $follower_count = $user->getFollowerCount($user->id);
        return view('users.show', [
            'user' => $login_user,
            'is_following'   => $is_following,
            'is_followed'    => $is_followed,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count
        ]);
    }
}
