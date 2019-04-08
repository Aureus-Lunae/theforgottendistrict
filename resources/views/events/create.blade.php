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

      <form method="POST" action="/events">
        {{ csrf_field() }}
        <input type="text" name="title" placeholder="Event title" />

        <label for="date">Date of the event</label>
        <input type="date" name="date" value="<?php echo gmdate('Y-m-d'); ?>" />

        <label for="time">Time in UTC</label>
        <input type="time" name="time" value="00:00" />

        <label for="enddate">End date (Only if it is different)</label>
        <input type="date" name="enddate" />

        <label for="endtime">End time in UTC (Only if end date is filled in)</label>
        <input type="time" name="endtime" value="00:00" />

        <textarea name="event" placeholder="Event description"></textarea>

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
