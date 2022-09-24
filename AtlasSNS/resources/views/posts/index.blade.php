@extends('layouts.login')

@section('content')
<div class="form">
  <?php $user=Auth::user();?>
    <img class="icon form-icon" src="{{url('storage/images'.$user->images)}}">
    <form action="{{ url('posts')}}" method="POST">
    @csrf
      <textarea class="text-form" name="post" placeholder="投稿内容を入力してください。"></textarea>
      <input type="image" class="post-btn" src="images/post.png" alt="投稿">
    </form>
</div>

<div id="main-content">
    @foreach($post as $post)
    <div class="timeline">
      <div class="post-common">
        <img class="icon post-icon" src="{{asset('storage/images'.$post->user->images)}}">
        <div class="post-name-text">
          <span class="post post-user">{{$post->user->username}}</span>
          <p class="post post-text">{!!nl2br(e($post->post))!!}</p>
        </div>
        <span class="post post-time">{{$post->updated_at}}</span>
      </div>
      <div class="owner-btn">
        @if($login_user_id == $post->user_id)
          <div class="content">
            <a class="js-modal-open" href="" post="{{$post->post}}" post_id="{{$post->id}}"><img class="" src="images/edit.png" alt="編集"></a>
          </div>
          <div class="modal js-modal">
            <div class="modal__bg js-modal-close"></div>
            <div class="modal__content">
              <form action="/edit" method="post" >
                <textarea class="post up-post-form" type="text" name="post"></textarea>
                <input type="hidden" class="id" name="id">
                <input class="up-btn" type="image" src="images/edit.png" value="更新">
                {{csrf_field()}}
              </form>
              <!-- <a class="js-modal-close" href="">閉じる</a> -->
            </div><!--modal__inner-->
          </div>

          <a class="delete-btn" href="/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除します。よろしいでしょうか？')"><i class=" fa-solid fa-trash-can"></i>
          </a>
        @endif
      </div>
    </div>
    @endforeach
</div>

<script src="{{ asset('js/script.js') }}" rel="stylesheet"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@endsection
