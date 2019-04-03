@extends('layouts.full')

@section('content')

<div class="home_page">

  <div class="info_box">
    <div class="img_container">
      <img src="/img/tfd_logo.svg" />
    </div>
    <div class="markdown homelinks">
@markdown
## The Forgotten District

We are a medieval styled survival server.

[Our staff](/staff)
@endmarkdown
    </div>
  </div>

  <div class="info_box">
    <div class="img_container">
      <img src="/img/site/stonecutter.svg" />
    </div>
    <div class="markdown homelinks">
@markdown
## Development

We are working on new content and events every day.

[News](#news) [Events](/events)
@endmarkdown
    </div>
  </div>

  <div class="info_box">
    <div class="img_container">
      <img src="/img/site/enchanting_table.svg" />
    </div>
    <div class="markdown homelinks">
@markdown
## Contact

We have a dedicated discord server for you to join.

[Discord](https://discord.gg/ZEXYTKt)
@endmarkdown
    </div>
  </div>

</div>


<a name="news"></a>
<div class="news_container">

  <h1 class="content_title"><i class="fas fa-newspaper"></i> Server News</h1>

  @foreach($news as $newsArticle)
  <div class="news">
    <h2 class="title">{{ $newsArticle->title }}</h2>
    @guest
    @else
    @if (Auth::user()->staff == 1 && Auth::user()->rank >= 6)
    <div class='edit'><a href="/news/{{$newsArticle->id}}/edit"> edit </a></div>
    @endif
    @endif
    <div class="date">{{ date('d-m-Y', strtotime($newsArticle->created_at)) }}</div>
    <div class="author">by {{ $newsArticle->user->name }}</div>

    <div class="markdown">
      @markdown
{{$newsArticle->news}}
      @endmarkdown
    </div>
  </div>
  @endforeach

  @if ($news->nextPageUrl() )
  <div class="older">
    <a href="{{ $news->nextPageUrl() }}"> <<< Older </a>
  </div>
  @endif
  @if ($news->previousPageUrl() )
  <div class="newer">
    <a href="{{ $news->previousPageUrl() }}"> Newer >>> </a>
  </div>
  @endif
</div>



@endsection
