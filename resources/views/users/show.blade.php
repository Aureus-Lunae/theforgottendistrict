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
      <h2 class="title">Options</h2>
      <div class="dashboard_links">
        <div class="links">
          <a href="/dashboard/pm/create?user={{$user->id}}">Send PM</a>
        </div>
      </div>
    </div>

    @if (Auth::user()->staff == 1 && Auth::user()->rank >= 5)
      <div class="dashboard">
        <h2 class="title"><i class="fas fa-eye"></i> Staff Dashboard</h2>

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
              <input type="submit" class="button delete" value="Delete Avatar"/>
            </form>
          </div>
        </div>
      </div>
    @endif
  </div>
@endsection