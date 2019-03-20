@extends('master')

@section('title', 'profile')

@section('content')
  <div class="main_container">
    <div class="profile">
      <div class="avatar_wrapper">
        <img src="/img/avatars/{{ $user->avatar }}" class="avatar">
      </div>

      <div class="data">
        <h2> {{ $user->name }}'s Profile </h2>

        <div class="rank"> {{$user->RankName}} </div>
        <div class="joined">Joined: {{ date('d-m-Y', strtotime($user->created_at)) }}</div>
        <p class="descr">{!! nl2br(e($user->desc )) !!}</p>
      </div>
    </div>
  </div>



  <div class="side_container">
    <div class="dashboard">
      <h2>Dashboard</h2>
    
      <div class="dashboard_links">
        <div class="links">
          <a href="/profile/changePassword">Change Password</a>
          <a href="/profile/changeDescr">Change Description</a>
        </div>
        <form enctype="multipart/form-data" action="/profile/avatar" method="POST">

          {{ method_field('PATCH') }}
          {{ csrf_field() }}
          @if ($errors->has('avatar'))
            <label class='alert alert_error'>{{ $errors->first('avatar') }}</label>
          @endif
          <label>Update Avatar:</label>
          <input type="file" name="avatar">
          <input type="submit" class="button" value="Change Avatar"/> 
        </form>
      </div>
      @if (Auth::user()->staff == 1 && Auth::user()->rank >= 3)
        <h2>Staff Dashboard</h2>
        <div class="dashboard_links">
          <div class="links">
          @if (Auth::user()->rank >= 4)
            <a href=/users>Show Users</a>
          @endif
          @if (Auth::user()->rank >= 6)
            <a href={{ route('createNews') }}>Add news</a>
          @endif
          </div>
        </div>
      @endif
    </div>
  </div>
@endsection