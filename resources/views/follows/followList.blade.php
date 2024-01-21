@extends('layouts.login')

@section('content')
<h1>Follow List</h1>
@foreach($userIcons as $userIcon)
<div><img src="{{$userIcon->images}}" alt=""></div>
@endforeach
<div>
    <table>
        @foreach($posts as $post)
        <tr>
            <td><img src="{{$post->user->images}}" alt=""></td>
            <td>{{ $post->user->username}}</td>
            <td>{{ $post->post}}</td>
            <td>{{ $post->updated_at}}</td>
        </tr>
        @endforeach
    </table>
</div>

@endsection