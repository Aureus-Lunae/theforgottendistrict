@extends('master')

@section('content')
  <div class="staff_container">

    {{-- Search Bar --}}

  <form class="search_form" action="/users/" method="GET">
    <input type="text" class="search" name="search">
    <input type="submit" class="button" value="Search"/>
  </form>

    {{-- Pagination top --}}
    @if ($users->hasMorePages() || $users->previousPageUrl() )
      <div class="pagination">
        @if ($users->currentPage() > 2 )
          <div class="first"><a href="{{ $users->url(1) }}"> <<< First</a></div>
        @endif

        @if ($users->previousPageUrl() )
          <div class="previous"><a href="{{ $users->previousPageUrl() }}">Previous</a></div>
        @endif

        <div class="current"> <a href="#">{{ $users->currentPage() }}</a></div>

        @if ($users->nextPageUrl() )
          <div class="next"><a href="{{ $users->nextPageUrl() }}"> Next</a></div>
        @endif

        @if ($users->currentPage() < $users->lastPage()-1 )
          <div class="last"><a href="{{ $users->url( $users->lastPage() ) }}">Last >>> </a></div>
        @endif
      </div>
    @endif

    {{-- Users --}}
    @foreach($users as $user)
      <a href="/users/{{$user->id}}">
        <div class="card_small">
          <h2 class="name"> {{ $user->name }}</h2>
          <div class="rank"> {{ $user->RankName }}</div>
          <div class="avatar"> <img src="/img/avatars/{{ $user->avatar }}"> </div>
        </div>
      </a>
    @endforeach

    {{-- Pagination bottom --}}
    @if ($users->hasMorePages() || $users->previousPageUrl() )
      <div class="pagination">
        @if ($users->currentPage() > 2 )
          <div class="first"><a href="{{ $users->url(1) }}"> <<< First</a></div>
        @endif

        @if ($users->previousPageUrl() )
          <div class="previous"><a href="{{ $users->previousPageUrl() }}">Previous</a></div>
        @endif

        <div class="current"> <a href="#">{{ $users->currentPage() }}</a></div>

        @if ($users->nextPageUrl() )
          <div class="next"><a href="{{ $users->nextPageUrl() }}"> Next</a></div>
        @endif

        @if ($users->currentPage() < $users->lastPage()-1 )
          <div class="last"><a href="{{ $users->url( $users->lastPage() ) }}">Last >>> </a></div>
        @endif
      </div>
    @endif
  </div>
@endsection