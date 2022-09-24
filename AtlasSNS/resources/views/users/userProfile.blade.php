@extends('layouts.login')

@section('content')
<div class="form">
  @foreach($user as $user)
    <img class="icon user-profile-icon" src="{{asset('storage/images'.$user->images)}}">
    <table class="prf-table">
      <tr><td class="prf-label">name</td><td>{{$user->username}}</td></tr>
      <tr><td class="prf-label">bio</td><td>{{$user->bio}}</td></tr>
    </table>

  @if(auth()->user()->isFollowing($user->id))
    <form class="prf-btn" action="{{route('unfollow',$user->id)}}" method="POST">
      {{csrf_field()}}
      {{method_field('DELETE')}}
      <button type="submit" class="btn btn-red">フォロー解除</button>
    </form>
  @else
    <form class="prf-btn" action="{{route('follow',$user->id)}}" method="POST">
      {{csrf_field()}}
      <button type="submit" class="btn btn-blue">フォローする</button>
    </form>
  @endif
  @endforeach
</div>


<div id="main-content">
  @foreach($timelines as $timelines)
    <div class="timeline">
      <div class="post-common">
        <a href="/profile/{{$timelines->user->id}}"><img class="icon post-icon" src="{{asset('storage/images'.$timelines->user->images)}}"></a>
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
