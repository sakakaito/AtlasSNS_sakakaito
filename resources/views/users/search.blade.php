@extends('layouts.login')

@section('content')
<div>
    <div>
        <form action="{{route('users.search')}}" method="post">
            @csrf
            <input type="text" name="keyword" placeholder="ユーザー名">
            <button type="submit" class="search-btn"><img src="images/search.png" alt=""></button>
            <p>検索ワード：</p>
        </form>
    </div>
</div>
@foreach($users as $user)
<div>
    <tr>
        <td>{{$user->images}}</td>
        <td>{{$user->username}}</td>
    </tr>
</div>
@endforeach
@endsection