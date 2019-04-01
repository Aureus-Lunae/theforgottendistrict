@extends('master')

@section('content')
<div class="upcoming_container">

  <h1 class="content_title"><i class="fas fa-calendar-alt"></i> Upcoming Events</h1>
  @foreach($upcomingEvents as $event)
  <div class="event">
    <h2 class="title">{{ $event->title }}</h2>
    @guest
    @else
      @if (Auth::user()->staff == 1 && Auth::user()->rank >= 6)
        <div class='edit'><a href="/events/{{$event->id}}/edit"> edit </a></div>
      @endif
    @endif
    <div class="date">
      Starts: {{ date('d-m-Y', strtotime($event->when)) }} {{ $event->showTime }}
      @if ($event->when != $event->end)
        <div>
          Ends: {{ date('d-m-Y', strtotime($event->end)) }} {{ $event->showEndtime }}
        </div>
      @endif
    </div>

    <div class="author">by {{ $event->user->name }}</div>
    <div class="markdown">
      @markdown
{{$event->event}}
      @endmarkdown
    </div>
  </div>
  @endforeach

  @if ($upcomingEvents->nextPageUrl() )
    <div class="newer">
      <a href="{{ $upcomingEvents->nextPageUrl() }}"> Next >>> </a>
    </div>
  @endif
  @if ($upcomingEvents->previousPageUrl() )
    <div class="older">
      <a href="{{ $upcomingEvents->previousPageUrl() }}"> <<< Previous </a>
    </div>
  @endif

</div>

<div class="events_container">

  <h1 class="content_title"><i class="fas fa-calendar-times"></i> Past Events</h1>

  @foreach($pastEvents as $past)
  <div class="event">
    <h2 class="title">{{ $past->title }}</h2>
    @guest
    @else
      @if (Auth::user()->staff == 1 && Auth::user()->rank >= 6)
        <div class='edit'><a href="/events/{{$past->id}}/edit"> edit </a></div>
      @endif
    @endif
    <div class="date">
      Starts: {{ date('d-m-Y', strtotime($past->when)) }} {{ $past->showTime }}
      @if ($past->when != $past->end)
      <div>
        Ends: {{ date('d-m-Y', strtotime($past->end)) }} {{ $past->showEndtime }}
      </div>
      @endif
    </div>

    <div class="author">by {{ $past->user->name }}</div>
    <div class="markdown">
      @markdown
{{$past->event}}
      @endmarkdown
    </div>
  </div>
  @endforeach

  @if ($pastEvents->nextPageUrl() )
    <div class="newer">
      <a href="{{ $pastEvents->nextPageUrl() }}"> Next >>> </a>
    </div>
  @endif
  @if ($pastEvents->previousPageUrl() )
    <div class="older">
      <a href="{{ $pastEvents->previousPageUrl() }}"> <<< Previous </a>
    </div>
  @endif
</div>

@endsection
