@extends('master')

@section('content')
  <div class="form_container">
    <div class="form_width">
      <h2>Edit News</h2>

      @if ($errors->any())
        @foreach ($errors->all() as $error)
          <label class='alert alert_error'>{{ $error }}</label>
        @endforeach
      @endif

      <form method="POST" action="/news/{{ $news->id }}">

    	 {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <label for="title">News Title</label>
        <input type="text" name="title" placeholder="news title" value="{{ $news->title}}" />

        <label class="count"><span id="amount">0</span> / 3000 characters.</label>

        <div class="wrap">
          <textarea name="news" placeholder="news" onKeyDown="textCounter(this.form.news,amount,3000)" onKeyUp="textCounter(this.form.news,amount,3000)" onfocus="textCounter(this.form.news,amount,3000)">{{ $news->news }}</textarea>
          <input class="toggle" id="toggle" type="checkbox" name="toggle">
          <label for="toggle" onclick="textCounter(this.form.news,amount,3000)"><i class="fas fa-eye"></i></label>
          <span id="display" class="markdown renderDisplay"></span>
        </div>

        <input type="submit" class="button" value="Update News"/>
      </form>

      <form method="POST" action="/news/{{ $news->id }}">

        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <input type="submit" class="button delete" value="Delete"/>
      </form>
    </div>
  </div>

  <div class="side_container">
    <div class="form_center_v">
      <img src="/img/site/book.png" alt="news" class="form_img" />
    </div>
  </div>

  <script src="/js/commonmark.js"></script>
  <script src="/js/character-count.js"></script>
@endsection