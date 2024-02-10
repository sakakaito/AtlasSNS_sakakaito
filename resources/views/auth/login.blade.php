@extends('layouts.logout')
@section('content')
<!-- 適切なURLを入力してください -->

{!! Form::open(['url' => '/login']) !!}

<p>AtlasSNSへようこそ</p>

{{ Form::label('e-mail') }}<br>
{{ Form::text('mail',null,['class' => 'input']) }}<br>
{{ Form::label('password') }}<br>
{{ Form::password('password',['class' => 'input']) }}<br>

{{ Form::submit('ログイン') }}



<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}
@endsection
