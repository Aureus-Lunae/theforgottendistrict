@extends('master')

@section('content')
  <div class="form_container">

  	<h1>Edit News</h1>
    <form method="POST" action="/news/{{ $news->id }}">

    	{{ method_field('PATCH') }}
      {{ csrf_field() }}
      <input type="text" name="title" placeholder="news title" value="{{ $news->title}}" />
      <textarea name="news" placeholder="news">{{ $news->news }}</textarea>
      <input type="submit" class="button" value="Update News"/> 
    </form>
    
  </div>
@endsection