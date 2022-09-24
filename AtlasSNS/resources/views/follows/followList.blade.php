@extends('layouts.login')

@section('content')
<div class="form">
  <div class="form-content">
    <p class="list-title">Follow List</p>
    <div class="follows-icon-list">
      @foreach($following_ids as $following_ids)
        <a href="/profile/{{$following_ids->id}}"><img class="icon" src="{{asset('storage/images/'.$following_ids->images)}}"></a>
      @endforeach
    </div>
  </div>
</div>

<div id="main-content">
  @foreach($timelines as $timelines)
    <div class="timeline">
      <div class="post-common">
        <a class="icon" href="/profile/{{$timelines->user->id}}"><img class="icon post-icon" src="{{asset('storage/images/'.$timelines->user->images)}}"></a>
        <div class="post-name-text">
          <span class="post post-user">{{$timelines->user->username}}</span>
          <p class="post post-text">{!!nl2br(e($timelines->post))!!}</p>
        </div>
        <span class="post post-time">{{$timelines->updated_at}}</span>
      </div>
    </div>
  @endforeach
</div>

<script src="{{ asset('js/script.js') }}" rel="stylesheet"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@endsection
