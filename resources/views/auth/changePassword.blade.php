@extends('master')

@section('content')
  <div class="form_container">
  	<div>
	  	<h2>Change Password</h2>
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

	    <form method="POST" action="/profile/changePassword">
	      @csrf

	      <label>Current Password</label>
	      <input type="password" name="currentPassword" required />

	      <label>New Password</label>
	      <input type="password" name="newPassword" required />
	      <label>Confirm New Password</label>
	      <input type="password" name="newPassword_confirmation" required />

	      <input type="submit" class="button" value="Change Password"/>
	    </form>
	  </div>

  </div>

  <div class="side_container">
    <img src="/img/site/chest.png" alt="change password" class="form_img" />
  </div>
@endsection