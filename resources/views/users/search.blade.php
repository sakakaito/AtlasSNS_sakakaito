@extends('layouts.login')

@section('content')
<div>
    <div>
        <form action="{{route('users.search')}}" method="post">
            @csrf
            <input type="text" name="keyword" id="searchWord" placeholder="ユーザー名">
            <button type="submit" class="search-btn"><img src="images/search.png" alt=""></button>
            <!-- <p>検索ワード：</p> -->
        </form>
    </div>
</div>
@if(!empty($keyword))
<p>検索ワード：{{$keyword}}</p>
@endif

@foreach($users as $user)
<div>
@if(isset($user)and!(Auth::user()==$user))
    <tr>
        <td>{{$user->images}}</td>
        <td>{{$user->username}}</td>
    </tr>
@endif
</div>

@endforeach
@endsection