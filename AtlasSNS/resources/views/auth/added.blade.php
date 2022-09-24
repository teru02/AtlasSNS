@extends('layouts.logout')

@section('content')

<div id="clear">
  <p>{{ session('username') }}さん</p>
  <p>ようこそ！AtlasSNSへ</p>
  <p class="text">ユーザー登録が完了しました。<br>早速ログインをしてみましょう！</p>

  <a href="/login" class="btn-red login">ログイン画面へ</a>
</div>

@endsection
