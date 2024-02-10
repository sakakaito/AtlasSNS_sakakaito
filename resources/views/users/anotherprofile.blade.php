@extends('layouts.login')

@section('content')
<div>
    <div>
        <img src="{{asset('storage/'.$user->images)}}" alt="">
    </div>
    <ul>
        <li>name {{$user->username}}</li>
        <li>bio {{$user->bio}}</li>
    </ul>
        @if(auth()->user()->isFollowing($user->id))
        <form action="{{route('unfollow',['user'=>$user->id])}}" method="post">
        @csrf
            <button type="submit">フォロー解除</button>
        </form>
        @else
        <form action="{{route('follow',['user'=>$user->id])}}" method="post">
        @csrf
            <button type="submit">フォローする</button>
        </form>
        @endif
</div>
@foreach($user->posts as $post)
<div>
        <ul>
            <!-- image -->
            <li><img src="{{asset('storage/'.$post->user->images)}}" alt=""></li>
            <!-- name -->
            <li>{{$post->user->username}}</li>
            <!-- post -->
            <li>{{$post->post}}</li>
            <!-- createtime -->
            <li>{{$post->updated_at}}</li>
        </ul>
</div>
@endforeach
@endsection