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
        return view('users.search',['users'=>$users]);
    }
}
