@extends('master')

@section('content')
  <div class="staff_container">
    @foreach($staff as $staffMember)
      <a href="/users/{{ $staffMember->id }}">
        <div class="card">
          <h2 class="name"> {{ $staffMember->name }}</h2>
          <div class="rank"> {{ $staffMember->RankName }}</div>
          <div class="avatar"> <img src="/img/avatars/{{ $staffMember->avatar }}"> </div>
          <div class="descr markdown">
            @markdown
{{$staffMember->desc}}
            @endmarkdown
          </div>
        </div>
      </a>
    @endforeach
  </div>
@endsection