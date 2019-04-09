@extends('master')
@section('content')
  <div class="form_container">
    <div class="form_width">
      <h2>New PM</h2>

      @if (session('error'))
        <div class="alert alert_error">
          {{ session('error') }}
        </div>
      @endif
      @if (session('success'))
        <div class="alert alert_success">
          {{ session('success') }}
        </div>
      @endif

      @if ($errors->any())
        @foreach ($errors->all() as $error)
          <label class='alert alert_error'>{{ $error }}</label>
        @endforeach
      @endif

      <form method="POST" action="/dashboard/pm">
        {{ csrf_field() }}
        <label for="title">Title</label>
        <input type="text" name="title" placeholder="title" maxlength="50"/>

        <label for="receiver">To</label>
        <input type="text" name="receiver" placeholder="to" {{ $receiver ? 'value=' . $receiver  : '' }} />

        <label for="msg">Message</label>
        <textarea name="msg" placeholder="Message" maxlength="1000"></textarea>

        <input type="submit" class="button" value="Send"/>
        @if ($receiver)
          <a href="/users/{{$userid}}">back</a>
        @else
          <a href="/dashboard/pm">back</a>
        @endif
      </form>
    </div>
  </div>

  <div class="side_container">
    <div class="form_center_v">
      <img src="/img/site/campfire.svg" alt="news" class="form_img" />
    </div>
  </div>
@endsection