@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}
<div class="user_register_form">
<h2>新規ユーザー登録</h2>

<!-- バリデーション後　エラー表示 -->
@if($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div>{{ Form::label('ユーザー名') }}</div>
<div>{{ Form::text('username',null,['class' => 'input']) }}</div>

<div>{{ Form::label('メールアドレス') }}</div>
<div>{{ Form::text('mail',null,['class' => 'input']) }}</div>

<div>{{ Form::label('パスワード') }}</div>
<div>{{ Form::password('password',null,['class' => 'input']) }}</div>

<div>{{ Form::label('パスワード確認') }}</div>
<div>{{ Form::password('password_confirmation',null,['class' => 'input']) }}</div>

<div class="register_btn">{{ Form::submit('新規登録',['class'=>'btn btn-danger']) }}</div>

<div><p><a href="/login">ログイン画面に戻る</a></p></div>
</div>
{!! Form::close() !!}


@endsection
