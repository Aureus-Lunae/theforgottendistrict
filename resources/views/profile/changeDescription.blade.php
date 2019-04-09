@extends('master')

@section('content')
  <div class="form_container">
  	<div>
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
	      <textarea name="descr" placeholder="Description" maxlength="500">{{ Auth::user()->desc }}</textarea>

	      <input type="submit" class="button" />
        <a href="/profile">back</a>
	    </form>
	  </div>

  </div>

  <div class="side_container">
    <div class="form_center_v">
      <img src="/img/site/book.png" alt="news" class="form_img" />
    </div>
  </div>
@endsection