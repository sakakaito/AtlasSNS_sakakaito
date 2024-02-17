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

<div>{{ Form::label('user name') }}</div>
<div>{{ Form::text('username',null,['class' => 'input']) }}</div>

<div>{{ Form::label('mail adress') }}</div>
<div>{{ Form::text('mail',null,['class' => 'input']) }}</div>

<div>{{ Form::label('password') }}</div>
<div>{{ Form::text('password',null,['class' => 'input']) }}</div>

<div>{{ Form::label('password comfirm') }}</div>
<div>{{ Form::text('password_confirmation',null,['class' => 'input']) }}</div>

<div class="register_btn">{{ Form::submit('REGISTER',['class'=>'btn btn-danger']) }}</div>

<div><p><a href="/login">ログイン画面へ戻る</a></p></div>
</div>
{!! Form::close() !!}


@endsection
