@extends('layouts.login')

@section('content')
<div class="another_user_content">
    <div>
        <img src="{{asset('storage/images/'.$user->images)}}" alt="">
    </div>
    <div class="another_user_profile">
        <ul>
            <li>name</li>
            <li>bio</li>
        </ul>
    </div>
    <div>
        <ul>
            <li>{{$user->username}}</li>
            <li>{{$user->bio}}</li>
        </ul>
    </div>
    <div class="another_user_btn">
        @if(auth()->user()->isFollowing($user->id))
        <form action="{{route('unfollow',['user'=>$user->id])}}" method="post">
        @csrf
            <button type="submit" class="btn btn-danger">フォロー解除</button>
        </form>
        @else
        <form action="{{route('follow',['user'=>$user->id])}}" method="post">
        @csrf
            <button type="submit" class="btn btn-primary">フォローする</button>
        </form>
        @endif
    </div>
</div>
@foreach($user->posts as $post)
<ul class="f_list_content">
    <div>
        <li><img src="{{asset('storage/images/'.$post->user->images)}}" alt=""></li>
    </div>
    <div>
        <li class="f_list_name">{{ $post->user->username}}</li>
        <li class="f_list_post">{{ $post->post}}</li>
    </div>
    <div>
        <li>{{ $post->updated_at}}</li>
    </div>
</ul>
@endforeach
@endsection