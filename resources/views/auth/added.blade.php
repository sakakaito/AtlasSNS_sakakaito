@extends('layouts.logout')

@section('content')

<div id="clear">
  <div class="welcome_atlas">
  <div class="register_name">
    <p>{{ session('username')}}さん</p>  <!-- ユーザー名を表示させる -->
    <p>ようこそ！AtlasSNSへ！</p>
  </div>
    <div class="register_completion">
      <p>ユーザー登録が完了しました。</p>
      <p>早速ログインをしてみましょう。</p>
    </div>
      <p class="btn btn-danger"><a href="/login">ログイン画面へ</a></p>
  </div>
</div>

@endsection