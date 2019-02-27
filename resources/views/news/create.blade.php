@extends('master')

@section('content')
  <div class="form_container">

    <form method="POST" action="/news">
      {{ csrf_field() }}
      <input type="text" name="title" placeholder="news title" />
      <textarea name="news" placeholder="news"></textarea>
      <input type="submit" class="button" /> 
    </form>
    
  </div>
@endsection