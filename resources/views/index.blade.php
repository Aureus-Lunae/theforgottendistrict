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
         <div class="author">by {{ $newsArticle->user_name }}</div>
        <p>{!! nl2br(e($newsArticle->news)) !!}</p>
      </div>
    @endforeach

    @if ($news->nextPageUrl() )
      <div class="older"><a href="{{ $news->nextPageUrl() }}">Older News</a></div>
    @endif

    @if ($news->previousPageUrl() )
      <div class="newer"><a href="{{ $news->previousPageUrl() }}">Newer</a></div>
    @endif

	</div>

  <div class="events_container">
  	<h1 class="content_title">Events</h1>
  	<div class="event">
  		<h2>Server Startup</h2>
    	<p>Server Startup</p>
    </div>
  </div>
@endsection