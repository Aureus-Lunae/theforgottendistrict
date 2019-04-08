@extends('layouts.reverse')

@section('content')
<div class="pm_container">

  <h1 class="content_title"><i class="fas fa-inbox"></i> Incoming Mail</h1>

    @foreach($received as $incoming)
      <div class="pm">
        <a href="{{ $incoming->id }}">
          @if ($incoming->read)
            <i class="fas fa-envelope-open"></i>
          @else
            <i class="fas fa-envelope"></i>
           @endif
          <label class="sender">{{ $incoming->sender->name }}</label>
          <label class="title">{{ $incoming->title }}</label>
          <label class="time">{{ date('d M', strtotime($incoming->created_at)) }}</label>
        </a>
      </div>
    @endforeach


  @if ($received->nextPageUrl() )
    <div class="newer">
      <a href="{{ $received->nextPageUrl() }}"> Next >>> </a>
    </div>
  @endif
  @if ($received->previousPageUrl() )
    <div class="older">
      <a href="{{ $received->previousPageUrl() }}"> <<< Previous </a>
    </div>
  @endif

</div>

<div class="pm_side_container">
  <h1 class="content_title"><i class="fas fa-inbox"></i>Menu</h1>
  <div class="links">
    <a href="/dashboard/pm/create"><i class="fas fa-at"></i> New PM</a>
    <a href="/dashboard/pm"><i class="fas fa-inbox"></i> Incoming</a>
    <a href="/dashboard/pm/outbox"><i class="fas fa-paper-plane"></i> Sent</a>
  </div>
</div>

@endsection
