@extends('master')

@section('content')
  <div class="form_container">
  	<div class="form_width">
    	<h2>Post News</h2>

      @if ($errors->any())
        @foreach ($errors->all() as $error)
          <label class='alert alert_error'>{{ $error }}</label>
        @endforeach
      @endif

      <form method="POST" action="/news">
        {{ csrf_field() }}
        <label for="title">News Title</label>
       <input type="text" name="title" placeholder="news title" />

        <label class="count"><span id="amount">0</span> / 3000 characters.</label>
        <div class="wrap">
          <textarea name="news" placeholder="news" onKeyDown="textCounter(this.form.news,amount,3000)" onKeyUp="textCounter(this.form.news,amount,3000)"></textarea>
          <input class="toggle" id="toggle" type="checkbox" name="toggle">
          <label for="toggle" onclick="textCounter(this.form.news,amount,3000)"><i class="fas fa-eye"></i></label>
          <span id="display" class="markdown renderDisplay"></span>
        </div>

        <input type="submit" class="button" />
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