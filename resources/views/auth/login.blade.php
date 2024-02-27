@extends('layouts.logout')
@section('content')
<!-- 適切なURLを入力してください -->

{!! Form::open(['url' => '/login']) !!}
<div class="login_form">
    <p>AtlasSNSへようこそ</p>

        <div>{{ Form::label('メールアドレス') }}</div>
        <div class="login_text">{{ Form::text('mail',null,['class' => 'input']) }}</div>
        <div>{{ Form::label('パスワード') }}</div>
        <div class="login_text">{{ Form::password('password',['class' => 'input']) }}</div>

        <div class=login_btn>{{ Form::submit('ログイン',['class' => 'btn btn-danger']) }}</div>



        <p class="new-user-link"><a href="/register">新規ユーザーの方はこちら</a></p>
</div>

{!! Form::close() !!}
@endsection
