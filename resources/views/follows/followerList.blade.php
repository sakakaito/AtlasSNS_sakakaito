@extends('layouts.login')

@section('content')
<h1>Follower List</h1>
@foreach($userIcons as $userIcon)
<div>
    <a href="{{route('users.another',['id'=>$userIcon->id])}}">
        <img src="storage/{{$userIcon->images}}" alt="">
    </a>
</div>
@endforeach
<div>
    <table>
        @foreach($posts as $post)
        <tr>
            <td><img src="storage/{{$post->user->images}}" alt=""></td>
            <td>{{ $post->user->username}}</td>
            <td>{{ $post->post}}</td>
            <td>{{ $post->updated_at}}</td>
        </tr>
        @endforeach
    </table>
</div>

@endsection