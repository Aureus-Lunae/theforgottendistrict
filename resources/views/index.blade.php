@extends('master')

@section('content')
<div class="news_container">

  <h1 class="content_title">Server News</h1>

  @foreach($news as $newsArticle)
  <div class="news">
    <h2>{{ $newsArticle->title }}</h2>
    @guest
    @else
    @if (Auth::user()->staff == 1 && Auth::user()->rank >= 6)
    <div class='edit'><a href="/news/{{$newsArticle->id}}/edit"> edit </a></div>
    @endif
    @endif
    <div class="date">{{ date('d-m-Y', strtotime($newsArticle->created_at)) }}</div>
    <div class="author">by {{ $newsArticle->user->name }}</div>
    <p>{!! nl2br(e($newsArticle->news)) !!}</p>
  </div>
  @endforeach

  @if ($news->nextPageUrl() )
  <div class="older"><a href="{{ $news->nextPageUrl() }}">
      <<< Older News</a> </div> @endif @if ($news->previousPageUrl() )
        <div class="newer"><a href="{{ $news->previousPageUrl() }}"> Newer >>> </a></div>
        @endif

  </div>

  <div class="events_container">
    <h1 class="content_title">Events</h1>
    @foreach($events as $event)
    <div class="event">
      <h2>{{ $event->title }}</h2>
      @guest
      @else
      @if (Auth::user()->staff == 1 && Auth::user()->rank >= 6)
      <div class='edit'><a href="/events/{{$event->id}}/edit"> edit </a></div>
      @endif
      @endif
      <div class="date">{{ date('d-m-Y', strtotime($event->when)) }} at {{ $event->showTime }} UTC</div>
      <div class="author">by {{ $event->user->name }}</div>
      <p>{!! nl2br(e($event->event)) !!}</p>
    </div>
    @endforeach
  </div>
  @endsection
