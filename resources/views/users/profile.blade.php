@extends('layouts.login')

@section('content')
<div>
    <img src="storage/{{Auth::user()->images}}" alt="">
</div>
<form method="post" enctype="multipart/form-data" action="{{route('users.profileupdate')}}">
    @csrf
    <div class="profile_form">
        <input type="hidden" name="id" value="{{Auth::user()->id}}">
        <div>
            <label for="username">user name</label>
                <input type="text" name="username" value="{{Auth::user()->username}}">
        </div>
        <div>
            <label for="mail">mail adress</label>
                <input type="mail" name="mail" value="{{Auth::user()->mail}}">
        </div>
        <div>
            <label for="password">password</label>
                <input type="password" name="password">
        </div>
        <div>
            <label for="password_confirm">password comfirm</label>
                <input type="password" name="password_confirmation">
        </div>
        <div>
            <label for="bio">bio</label>
                <input type="text" name="bio" value="{{Auth::user()->bio}}">
        </div>
        <div>
            <label for="icon_image" placeholder="ファイルを選択">icon image</label>
                <input type="file" name="icon_image">
        </div>
        <button type="submit">更新</button>


    </div>
</form>



@endsection