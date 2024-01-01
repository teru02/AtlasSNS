@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<p class="caption">AtlasSNSへようこそ</p>

{{ Form::label('mail adress') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('LOGIN',['class'=>'btn-red']) }}

<p class="text"><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
