@extends('master')
@section('content')
  <div class="form_container">
    <div class="form_width">
      <h2>Post Event</h2>

      @if ($errors->any())
        @foreach ($errors->all() as $error)
          <label class='alert alert_error'>{{ $error }}</label>
        @endforeach
      @endif

      <form method="POST" action="/events/{{$event->id}}">

        @csrf
        @method('PATCH')

        <label for="date">Event Title</label>
        <input type="text" name="title" value="{{old('title') ? old('title') : $event->title }}" />

        <label for="date">Date of the event</label>
        <input type="date" name="date" value="{{ old('date') ? old('date') : $event->when }}" />

        <label for="time">Time in UTC</label>
        <input type="time" name="time" value="{{old('time') ? old('time') : $event->time }}" />

        <label for="enddate">End date</label>
        <input type="date" name="enddate" value="{{old('enddate') ? old('enddate') : $event->end}}" />

        <label for="endtime">End time in UTC</label>
        <input type="time" name="endtime" value="{{old('endtime') ? old('endtime') : $event->endtime}}" />

        <textarea name="event" placeholder="Event description">{{old('event') ? old('event') : $event->event}}</textarea>

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
