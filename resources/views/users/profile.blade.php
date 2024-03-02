@extends('layouts.login')

@section('content')
@if($errors->any())
<div>
    <ul class="error_sentence">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="post" enctype="multipart/form-data" action="{{route('users.profileupdate')}}">
    @csrf
    <div class="profile_form">
        <img class="p_form_icon" src="{{asset('storage/images/'.Auth::user()->images)}}" alt="">

        <input type="hidden" name="id" value="{{Auth::user()->id}}">
        <div>
            <label for="username">ユーザー名</label>
                <input type="text" name="username" value="{{Auth::user()->username}}">
        </div>
        <div>
            <label for="mail">メールアドレス</label>
                <input type="mail" name="mail" value="{{Auth::user()->mail}}">
        </div>
        <div>
            <label for="password">パスワード</label>
                <input type="password" name="password">
        </div>
        <div>
            <label for="password_confirm">パスワード確認</label>
                <input type="password" name="password_confirmation">
        </div>
        <div>
            <label for="bio">自己紹介文</label>
                <input type="text" name="bio" value="{{Auth::user()->bio}}">
        </div>
        <!-- <div> -->
            <div class="p_form_image_content">
                <label for="icon_image" placeholder="ファイルを選択">アイコン画像</label>
                <label for="image" class="p_form_image">
                    <p>ファイルを選択</p>
                    <input type="file" id="image" name="icon_image">
                </label>
            </div>
        <!-- </div> -->
    </div>
    <div class="p_form_btn">
            <button type="submit" class="btn btn-danger">更新</button>
    </div>
</form>


@endsection