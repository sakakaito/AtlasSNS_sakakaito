@extends('layouts.login')

@section('content')
<div class="f_list_head">
    <div>
        <h1 class="f_list_title">Follow List</h1>
    </div>
    @foreach($userIcons as $userIcon)
    <div class="f_list_icon">
        <a href="{{route('users.another',['id'=>$userIcon->id])}}">
            <img src="{{asset('storage/images/'.$userIcon->images)}}" alt="">
        </a>
    </div>
    @endforeach
</div>

<div class="f_list_area">
        @foreach($posts as $post)
        <ul class="f_list_content">
            <div>
                <li><img src="{{asset('storage/images/'.$post->user->images)}}" alt=""></li>
            </div>
            <div>
                <li class="f_list_name">{{ $post->user->username}}</li>
                <li class="f_list_post">{{ $post->post}}</li>
            </div>
            <div>
                <li>{{substr($post->updated_at,0,16)}}</li>
            </div>
        </ul>
        @endforeach
</div>

@endsection