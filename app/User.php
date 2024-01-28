<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password','images',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //リレーション設定（ユーザーは複数の投稿を持つ可能性がある）
    public function posts(){
        return $this->hasMany(Post::class);
    }
    //リレーション（多対多）
    public function follows(){
        return $this->belongsToMany('App\User','follows','following_id','followed_id');
    }
    public function followers(){
        return $this->belongsToMany('App\User','follows','followed_id','following_id');
    }
    //フォローする
    public function follow(Int $user_id){
        return $this->follows()->attach($user_id);
    }
    //フォロー解除する
    public function unfollow(Int $user_id){
        return $this->follows()->detach($user_id);
    }
    //フォローしているか
    public function isFollowing(Int $user_id){
        return(bool)$this->follows()->where('followed_id',$user_id)->first();
    }
    //フォローされているか
    public function isFollowed(Int $user_id){
        return(bool)$this->followers()->where('following_id',$user_id)->first();
    }

    //フォロー数の表示
    public function getFollowCount($user_id)
    {
        return $this->where('following_id', $user_id)->count();
    }
    //フォロワー数の表示
    public function getFollowerCount($user_id)
    {
        return $this->where('followed_id', $user_id)->count();
    }
}
