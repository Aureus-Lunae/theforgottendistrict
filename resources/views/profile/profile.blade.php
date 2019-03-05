@extends('master')

@section('title', 'profile')

@section('content')
  <div class="main_container">
    <div class="profile">
      <img src="/img/avatars/{{ $user->avatar }}" style="width: 256px; height: 256px; float:left; border-radius: 50%; margin-right: 32px;">
      <h2> {{ $user->name }}'s Profile </h2>

      <div class="joined">Joined: {{ date('d-m-Y', strtotime($user->created_at)) }}</div>
      <p class="descr">{!! nl2br(e($user->desc )) !!}</p>
    </div>

    <form enctype="multipart/form-data" action="/profile/avatar" method="POST">
      {{ method_field('PATCH') }}
      {{ csrf_field() }}
      <label>Update Avatar:</label>
      <input type="file" name="avatar">
      <input type="submit" class="button" value="Change Avatar"/> 
    </form>
  </div>



  <div class="side_container">

  </div>
@endsection