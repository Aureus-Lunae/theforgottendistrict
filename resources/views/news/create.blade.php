@extends('master')

@section('content')
  <div class="form_container">
  	<div>
  		<h2>Post News</h2>

	    <form method="POST" action="/news">
	      {{ csrf_field() }}
	      <input type="text" name="title" placeholder="news title" />
	      <textarea name="news" placeholder="news"></textarea>
	      <input type="submit" class="button" /> 
	    </form>
    </div>
  </div>

  <div class="side_container">
    <div class="form_center_v">
      <img src="/img/site/book.png" alt="news" class="form_img" />
    </div>
  </div>
@endsection