@extends('master')

@section('title', 'profile')

@section('content')
  <div class="main_container">
    <div class="profile">
      <img src="/img/avatars/{{ $user->avatar }}" class="avatar">
      <h2> {{ $user->name }}'s Profile </h2>

      <div class="joined">Joined: {{ date('d-m-Y', strtotime($user->created_at)) }}</div>
      <p class="descr">{!! nl2br(e($user->desc )) !!}</p>
    </div>

    <div class="profile_links">
      <div class="links">
        <a href="/profile/changePassword">Change Password</a>
        <a href="/profile/changeDescr">Change Description</a>
      </div>
      <form enctype="multipart/form-data" action="/profile/avatar" method="POST">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <label>Update Avatar:</label>
        <input type="file" name="avatar">
        <input type="submit" class="button" value="Change Avatar"/> 
      </form>
    </div>
  </div>



  <div class="side_container">

  </div>
@endsection