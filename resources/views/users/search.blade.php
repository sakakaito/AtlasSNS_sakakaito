@extends('layouts.login')

@section('content')
<div>
    <div>
        <form action="{{route('users.search')}}" method="post" class="search_form">
            @csrf
            <div>
                <input type="text" class="s_form_name" name="keyword" id="searchWord" placeholder="ユーザー名">
            </div>
            <div>
                <button><img  type="submit" class="" src="images/search.png" alt=""></button>
            </div>
            <div>
                @if(!empty($keyword))
                <p>検索ワード：{{$keyword}}</p>
                @endif
            </div>
        </form>
    </div>
</div>


<div class="search_user_content">
@foreach($users as $user)
@if(isset($user)and!(Auth::user()==$user))
    <ul class="search_user">
        <li><img src="{{asset('storage/images/'.$user->images)}}" alt=""></li>
        <li>{{$user->username}}</li>
        <li>
            @if(auth()->user()->isFollowing($user->id))
            <div class="s_user_btn">
                <form action="{{route('unfollow',['user'=>$user->id])}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">フォロー解除</button>
                </form>
            </div>
            @else
            <div class="s_user_btn">
                <form action="{{route('follow',['user'=>$user->id])}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">フォローする</button>
                </form>
            </div>
            @endif
        </li>
    </ul>
@endif

@endforeach
</div>
@endsection