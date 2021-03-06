@extends('master')

@section('content')
  <div class="form_container">
  	<div class="form_width">
	  	<h2>Change Descr</h2>
      <a href="/profile">Back</a>

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

	    <form method="POST" action="/profile/changeDescr">
	      {{ csrf_field() }}

	      <label>Current Password</label>
	      <input type="password" name="currentPassword" required />

	      <label>Description</label>
        <label class="count"><span id="amount">0</span> / 500 characters.</label>
        <div class="wrap">
	        <textarea name="descr" placeholder="Description" onKeyDown="textCounter(this.form.descr,amount,500)" onKeyUp="textCounter(this.form.descr,amount,500)" onfocus="textCounter(this.form.descr,amount,500)">{{ Auth::user()->desc }}</textarea>
          <input class="toggle" id="toggle" type="checkbox" name="toggle">
          <label for="toggle" onclick="textCounter(this.form.descr,amount,500)"><i class="fas fa-eye"></i></label>
          <span id="display" class="markdown renderDisplay"></span>
        </div>


	      <input type="submit" class="button" value="Change Description"/>
        <a href="/profile">back</a>
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