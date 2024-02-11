@extends('layouts.login')

@section('content')
<h1>Follow List</h1>
@foreach($userIcons as $userIcon)
<div>
    <a href="{{route('users.another',['id'=>$userIcon->id])}}">
        <img src="{{asset('storage/images/'.$userIcon->images)}}" alt="">
    </a>
</div>
@endforeach
<div>
    <table>
        @foreach($posts as $post)
        <ul>
            <li><img src="{{asset('storage/images/'.$post->user->images)}}" alt=""></li>
            <li>{{ $post->user->username}}</li>
            <li>{{ $post->post}}</li>
            <li>{{ $post->updated_at}}</li>
        </ul>
        @endforeach
    </table>
</div>

@endsection