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

    @if (Auth::user()->staff == 1 && Auth::user()->rank >= 5)
      <div class="profile_links">
        @if (Auth::user()->rank >= 7)
          <div class="links">
            <a href="/users/{{$user->id}}/edit">Edit User</a>
          </div>
        @endif

        <form enctype="multipart/form-data" action="/users/{{$user->id}}/avatar" method="POST">
          {{ method_field('DELETE') }}
          {{ csrf_field() }}
          <input type="submit" class="button" value="Delete Avatar"/> 
        </form>
      </div>
    @endif
  </div>



  <div class="side_container">

  </div>
@endsection