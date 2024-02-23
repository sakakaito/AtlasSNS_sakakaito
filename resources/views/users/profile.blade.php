@extends('layouts.login')

@section('content')

<form method="post" enctype="multipart/form-data" action="{{route('users.profileupdate')}}">
    @csrf
    <div class="profile_form">
    <img class="p_form_icon" src="storage/{{Auth::user()->images}}" alt="">

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
        <!-- <div> -->
            <div class="p_form_image_content">
                <label for="icon_image" placeholder="ファイルを選択">icon image</label>
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