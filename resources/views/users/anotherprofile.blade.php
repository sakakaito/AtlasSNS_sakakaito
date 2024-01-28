@extends('layouts.login')

@section('content')
<div>
    <div>
        <img src="{{asset('/storage/images/')}}" alt="">
    </div>
    <ul>
        <li>name</li>
        <li>bio</li>
    </ul>
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
            @endif</div>

<div>
    <table>
        <tr>
            <!-- name -->
            <td></td>
            <!-- bio -->
            <td></td>
            <!-- post -->
            <td></td>
        </tr>
    </table>
</div>
@endsection