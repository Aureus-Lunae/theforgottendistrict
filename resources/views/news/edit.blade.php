@extends('master')

@section('content')
  <div class="form_container">
    <div>
      <h2>Edit News</h2>
      <form method="POST" action="/news/{{ $news->id }}">

    	 {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <input type="text" name="title" placeholder="news title" value="{{ $news->title}}" />
        <textarea name="news" placeholder="news">{{ $news->news }}</textarea>
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
@endsection