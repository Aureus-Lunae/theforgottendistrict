@extends('layouts.reverse')

@section('content')
<div class="pm_container">

  <h1 class="content_title"><i class="fas fa-paper-plane"></i> Outgoing Mail</h1>

    @foreach($sent as $outgoing)
      <div class="pm">
        <div class="icons icon">
          <form action="/dashboard/pm/{{$outgoing->id}}" method="POST">
              {{ method_field('DELETE') }}
              {{ csrf_field() }}
              <button class="trash"><i class='fas fa-trash'></i></button>
          </form>
        </div>
        <a href="/dashboard/pm/{{ $outgoing->id }}">
          <label class="sender">{{ $outgoing->receiver->name }}</label>
          <label class="title">{{ $outgoing->title }}</label>
          <label class="time">{{ date('d M', strtotime($outgoing->created_at)) }}</label>
        </a>
      </div>
    @endforeach


  @if ($sent->nextPageUrl() )
    <div class="newer">
      <a href="{{ $sent->nextPageUrl() }}"> Next >>> </a>
    </div>
  @endif
  @if ($sent->previousPageUrl() )
    <div class="older">
      <a href="{{ $sent->previousPageUrl() }}"> <<< Previous </a>
    </div>
  @endif

</div>

<div class="pm_side_container">
  <h1 class="content_title"><i class="fas fa-inbox"></i> Menu</h1>

  @if (session('success'))
    <div class="alert alert_success">
      {{ session('success') }}
    </div>
  @endif

  <div class="links">
    <a href="/dashboard/pm/create"><i class="fas fa-at"></i> New PM</a>
    <a href="/dashboard/pm"><i class="fas fa-inbox"></i> Incoming</a>
    <a href="/dashboard/pm/outbox"><i class="fas fa-paper-plane"></i> Sent</a>
  </div>
</div>

@endsection
