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
        <input type="text" name="title" placeholder="title" maxlength="50"/ value="Re: {{ $pm->title }}">

        <label for="receiver">To</label>
        <input type="text" name="receiver" placeholder="to" value="{{ $pm->sender->name }}"/>

        <label for="msg">Message</label>
        <label class="count"><span id="amount">0</span> / 1000 characters.</label>
        <div class="wrap">
          <textarea name="msg" placeholder="Message" onKeyDown="textCounter(this.form.msg,amount,1000)" onKeyUp="textCounter(this.form.msg,amount,1000)" onfocus="textCounter(this.form.msg,amount,1000)"></textarea>
          <input class="toggle" id="toggle" type="checkbox" name="toggle">
          <label for="toggle" onclick="textCounter(this.form.msg,amount,1000)"><i class="fas fa-eye"></i></label>
          <span id="display" class="markdown renderDisplay"></span>
        </div>

        <input type="submit" class="button" value="Reply"/>
        <a href="/dashboard/pm">back</a>
      </form>
    </div>
  </div>

  <div class="side_container">
    <div class="form_center_v">
      <img src="/img/site/campfire.svg" alt="news" class="form_img" />
    </div>
  </div>

  <script src="/js/commonmark.js"></script>
  <script src="/js/character-count.js"></script>
@endsection