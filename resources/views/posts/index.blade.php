@extends('layouts.login')

@section('content')
<!--<h2>機能を実装していきましょう。</h2>-->
<div class="post_content">
    <form method="post" action="{{ route('posts.store') }}">
        @csrf
        <div class="post_list">
            <div><img src="{{asset('storage/images/'.Auth::user()->images)}}" alt=""></div>
            <div><textarea name="post" id="" cols="30" rows="10" placeholder="投稿内容を登録してください"></textarea></div>
            <button type="submit" ><img class="post_btn_image" src="images/post.png" alt=""></button>
        </div>
    </form>
</div>
<!-- 一覧表示 -->
@foreach($posts as $post)
<div class="list-area">
    <ul class="user_post_list">
        <div class="item_icon">
            <li><img src="{{asset('storage/images/'.$post->user->images)}}" alt=""></li>
        </div>
        <div class="item_username_post">
            <li>{{ $post->user->username}}</li>
            <li>{{ $post->post}}</li>
        </div>
        <div class="item_updated_btn">
        <li>{{ $post->updated_at}}</li>
        @if(Auth::id() == $post->user_id)
            <div class="btn_area">
                <li>
                    <div class="edit-button-area">
                        <img src="images/edit.png" type='submit' class="edit-button js-edit-button" data-post="{{ $post->post}}" data-id="{{$post->id}}">
                    </div>
                </li>
                <li>
                    <img src="images/trash.png" type='submit' class="delete-button js-delete-button" data-id="{{$post->id}}" >
                </li>
            </div>
        @endif
        </div>
    </ul>
</div>

@endforeach
<!-- モーダルウィンドウ画面 (編集）-->
<div class="layer js-modal">
 <div class="modal">
  <div class="modal_inner">
   <div class="modal_content">
    <form method="post" action="{{route('posts.update')}}">
 @csrf
     <div class="edit-area">
      <textarea class="edit-text js-modal-text" name="post" id="inputText" cols="30" rows="10" value=""></textarea>
      <input class="" type="hidden" id="inputId" value="" name="textId">
        <img src="images/edit.png" type="submit" alt="">
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
         <form method="post" action="{{route('posts.delete')}}">
            @csrf
          <button type="submit">OK</button>
          <input type="hidden" id="inpulieleteId" value="" name="deleteId">
         </form>
        <button type="submit" class="del-button-close js-del-button-close">キャンセル</button>
    </div>
</div>





@endsection