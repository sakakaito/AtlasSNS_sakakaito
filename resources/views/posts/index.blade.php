@extends('layouts.login')

@section('content')
<!--<h2>機能を実装していきましょう。</h2>-->
<div>
    <form method="post" action="{{ route('posts.store') }}">
        @csrf
        <div>
            <img src="{{Auth::user()->images}}" alt="">
            <!--<input type="text">-->
            <textarea name="post" id="" cols="30" rows="10" placeholder="投稿内容を登録してください"></textarea>
            <button type='submit'><img src="images/post.png" alt=""></button>
        </div>
    </form>
</div>
<!-- 一覧表示 -->
<div>
@foreach($posts as $post)
<div class="list-area">
    <tr>
        <td><img src="{{ $post->user->images}}" alt=""></td>
        <td>{{ $post->user->username}}</td>
        <td>{{ $post->post}}</td>
        <td>{{ $post->created_at}}</td>
        <td>
            <div class="edit-button-area">
            <!-- <a href="{{route('posts.edit',$post->id)}}"  method="post"> -->
            <button type='submit' class="edit-button js-edit-button"><img src="images/edit.png" class="edit-image" alt="編集"></button>
            <!-- </a> -->
            </div>
        </td>
        <td>
            <button type='submit' class="delete-button js-delete-button"><img src="images/trash.png" class="trash-image" alt="削除"></button>
        </td>
    </tr>
</div>

@endforeach
<!-- モーダルウィンドウ画面 (編集）-->
<div class="layer js-modal">
 <div class="modal">
  <div class="modal_inner">
   <div class="modal_content">
    <form method="post" action="{{route('posts.update',$post->id)}}">
 @csrf
     <div class="edit-area">
      <textarea class="edit-text" name="edit-text" id="" cols="30" rows="10" value=""></textarea>
      <button type='submit'><img src="images/edit.png" alt=""></button>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>
<!-- モーダルウィンドウ画面（削除） -->
<div class="modal-delete js-modal-delete">
    <div class="modal-delete-content">
        <p>この投稿を削除します。よろしいでしょうか？</p>
        <button type="submit">OK</button>
        <button type="submit" class="del-button-close js-del-button-close">キャンセル</button>
    </div>
</div>
</div>




@endsection