@extends('master')

@section('title', 'profile')

@section('content')
<div class="main_container">
  <div class="profile">
    <div class="avatar_wrapper">
      <img src="/img/avatars/{{ $user->avatar }}" class="avatar">
    </div>

    <div class="data">
      <h2 class="title"><i class="fas fa-user"></i> {{ $user->name }}'s Profile </h2>

      <div class="rank"> {{$user->RankName}} </div>
      <div class="joined">Joined: {{ date('d-m-Y', strtotime($user->created_at)) }}</div>
      <div class="descr markdown">
        @markdown
{{$user->desc}}
        @endmarkdown
      </div>
    </div>
  </div>
</div>

<div class="side_container">
  <div class="dashboard">
    <h2 class="title"><i class="fas fa-book"></i> Dashboard</h2>

    <div class="dashboard_links">
      <div class="links">
        <a href="/dashboard/pm">PM</a>
        <a href="/profile/changePassword">Change Password</a>
        <a href="/profile/changeDescr">Change Description</a>
      </div>
      <form enctype="multipart/form-data" action="/profile/avatar" method="POST">

        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        @if ($errors->any())
          @foreach ($errors->all() as $error)
            <label class='alert alert_error'>{{ $error }}</label>
          @endforeach
        @endif

        <label>Update Avatar:</label>
        <input type="file" name="avatar">
        <input type="submit" class="button" value="Change Avatar" />
      </form>
    </div>

    @if (Auth::user()->staff == 1 && Auth::user()->rank >= 3)
    <h2 class="title"><i class="fas fa-eye"></i> Staff Dashboard</h2>
    <div class="dashboard_links">
      <div class="links">
        @if (Auth::user()->rank >= 4)
        <a href=/users>Show Users</a>
        @endif
        @if (Auth::user()->rank >= 6)
          <a href={{ route('createNews') }}>Add news</a>
          <a href="/events/create">Add Event</a>
        @endif
      </div>
    </div>
    @endif

  </div>
</div>
@endsection
