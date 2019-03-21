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
    @if (Auth::user()->staff == 1 && Auth::user()->rank >= 5)
      <div class="dashboard">
        <h2>Staff Dashboard</h2>
      
        <div class="dashboard_links">
          <div class="links">
            @if ( $user->rank < 5 || (Auth::user()->rank == 7 && $user->rank <= 7) || Auth::user()->rank == 8 )

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
        </div>
      </div>
    @endif
  </div>
@endsection