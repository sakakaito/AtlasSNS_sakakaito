@extends('layouts.login')

@section('content')
<!--<h2>機能を実装していきましょう。</h2>-->
<div>
    <form method="post" action="{{ route('post.store') }}">
        @csrf
        <div>
            <img src="{{Auth::user()->images}}" alt="">
            <!--<input type="text">-->
            <textarea name="post" id="" cols="30" rows="10" placeholder="投稿内容を登録してください"></textarea>
            <button type='button'><img src="images/post.png" alt=""></button>
        </div>
    </form>
</div>

@endsection