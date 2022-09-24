@extends('layouts.login')

@section('content')
<div class="form">
  <div class="search-form">
    <form action="/search" method="get">
    {{csrf_field()}}
      <input type="text" placeholder="ユーザー名" name="search" value="">
      <button>
        <i class="fas fa-search fa-2x"></i>
      </button>
    </form>
  </div>

  <div class="search_word">
    @if(isset($keyword))
    <p>検索ワード：{{$keyword}}</p>
    @endif
  </div>
</div>

<div id="main-content">
  @foreach($users as $users)
    <div class="user_table">
      <img class="icon search-icon" src="{{asset('storage/images/'.$users->images)}}">
      <span class="search-name">{{$users->username}}</span>

      <div class="d-flex">
        @if(auth()->user()->isFollowing($users->id))
          <form action="{{route('unfollow',$users->id)}}" method="POST">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button type="submit" class="btn btn-red">フォロー解除</button>
          </form>
        @else
          <form action="{{route('follow',$users->id)}}" method="POST">
          {{csrf_field()}}
            <button type="submit" class="btn btn-blue">フォローする</button>
          </form>
        @endif
      </div>
    </div>
  @endforeach
</div>


<script src="{{ asset('js/script.js') }}" rel="stylesheet"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@endsection
