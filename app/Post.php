<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'user_id','post',
    ];
    //リレーション設定（一つの投稿は一人のユーザーに紐づく）
    public function user(){
        return $this->belongsTo(User::class);
    }
}
