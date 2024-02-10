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
        <td><img src="storage/{{$user->images}}" alt=""></td>
        <td>{{$user->username}}</td>
        <td>
            @if(auth()->user()->isFollowing($user->id))
            <div>
                <form action="{{route('unfollow',['user'=>$user->id])}}" method="post">
                    @csrf
                    <button type="submit">フォロー解除</button>
                </form>
            </div>
            @else
            <div>
                <form action="{{route('follow',['user'=>$user->id])}}" method="post">
                    @csrf
                    <button type="submit">フォローする</button>
                </form>
            </div>
            @endif
        </td>
    </tr>
@endif
</div>

@endforeach
@endsection