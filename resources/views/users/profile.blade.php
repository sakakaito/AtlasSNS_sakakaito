@extends('layouts.login')

@section('content')
<div>
    <img src="" alt="">
</div>
<form action="">
    <div class="profile_form">
        <div>
            <label for="username">user name</label>
                <input type="text">
        </div>
        <div>
            <label for="mail">mail adress</label>
                <input type="mail">
        </div>
        <div>
            <label for="password">password</label>
                <input type="password">
        </div>
        <div>
            <label for="password_confirm">password comfirm</label>
                <input type="password">
        </div>
        <div>
            <label for="bio">bio</label>
                <input type="text">
        </div>
        <div>
            <label for="icon_image">icon image</label>
                <input type="url">
        </div>


    </div>
</form>



@endsection