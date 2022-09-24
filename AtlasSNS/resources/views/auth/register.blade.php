@extends('layouts.logout')

@section('content')

{!! Form::open(['action'=>'Auth\RegisterController@register','method'=>'post']) !!}
{{csrf_field()}}

<p class="caption">新規ユーザー登録</p>

{{ Form::label('user name') }}
{{ Form::text('username',null,['class' => 'input']) }}
<div class="error">
  @if($errors->first('username'))
    {{$errors->first('username')}}
  @endif
</div>

{{ Form::label('mail address') }}
{{ Form::text('mail',null,['class' => 'input']) }}
<div class="error">
  @if($errors->first('mail'))
    {{$errors->first('mail')}}
  @endif
</div>

{{ Form::label('password') }}
{{ Form::password('password',null,['class' => 'input']) }}
<div class="error">
  @if($errors->first('password'))
    {{$errors->first('password')}}
  @endif
</div>

{{ Form::label('password confirm') }}
{{ Form::password('password_confirmation',null,['class' => 'input']) }}
<div class="error">
  @if($errors->first('password_confirmation'))
    {{$errors->first('password_confirmation')}}
  @endif
</div>
<!-- confirmかconfimationか? -->
{{ Form::submit('REGISTER',['class'=>'btn-red']) }}

<p class="text"><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
