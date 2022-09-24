@extends('layouts.login')

@section('content')

<div class="profile-edit">
  <image class="profile-icon" src="{{asset('storage/images/' . $user->images)}}"></image>
  <div class="edit-form">
    <form action="/profile/edit" method="post" enctype="multipart/form-data">
      <input type="hidden" value="{{$user->id}}" name="id">
      {{csrf_field()}}
      <div class="edit-content">
        <p>user name</p>
          <input type="text" name="username" value="{{$user->username}}">
      </div>
      <div class="error">
          @if($errors->first('username'))
            {{$errors->first('username')}}
          @endif
      </div>
      <div class="edit-content">
        <p>mail adress</p>
        <input type="mail" name="mail" value="{{$user->mail}}" required>
      </div>
      <div class="error">
        @if($errors->first('mail'))
          {{$errors->first('mail')}}
        @endif
      </div>
      <div class="edit-content">
        <p>password</p>
        <input type="password" name="password">
      </div>
      <div class="error">
        @if($errors->first('password'))
          {{$errors->first('password')}}
        @endif
      </div>
      <div class="edit-content">
        <p>password confirm</p>
        <input type="password" name="password_confirmation">
      </div>
      <div class="error">
        @if($errors->first('password_confirmation'))
          {{$errors->first('password_confirmation')}}
        @endif
      </div>
      <div class="edit-content">
        <p>bio</p>
        <input type="text" name="bio" value="{{$user->bio}}">
      </div>
      <div class="error">
        @if($errors->first('bio'))
          {{$errors->first('bio')}}
        @endif
      </div>
      <div class="edit-content">
        <p>icon image</p>
        <label class="file-edit">
          <input type="file" name="icon_image">ファイルを選択
        </label>
      </div>
      <div class="error">
        @if($errors->first('icon_image'))
          {{$errors->first('icon_image')}}
        @endif
      </div>
      <input class="btn btn-red prf-edit-btn" type="submit" value="更新">
    </form>
  </div>
</div>


<script src="{{ asset('js/script.js') }}" rel="stylesheet"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

@endsection
