@extends('master')

@section('content')
  <div class="form_container">
  	<div class="form_width">
	  	<h2>Edit User Data</h2>
      <a href="/users/{{$user->id}}">Back</a>
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

	    <form method="POST" action="/users/{{$user->id}}">
        @csrf
        @method('PATCH')

	      <label>Description</label>
	      <textarea name="descr" placeholder="Description" maxlength="500">{{ $user->desc }}</textarea>

        <div class="radio_options">
          <label class="radio_main_label">Rank</label>
          <div class="radio_selection">
            <div><input type="radio" name="rank" value="0" {{ $user->rank == 0 ? ' checked="checked" ' : '' }}> <label class="radiolabel">Member</label></div>
            <div><input type="radio" name="rank" value="1" {{ $user->rank == 1 ? ' checked="checked" ' : '' }}> <label class="radiolabel">Donator</label></div>
             <div><input type="radio" name="rank" value="2" {{ $user->rank == 2 ? ' checked="checked" ' : '' }}> <label class="radiolabel">Special</label></div>
            <div><input type="radio" name="rank" value="3" {{ $user->rank == 3 ? ' checked="checked" ' : '' }}> <label class="radiolabel">Helper</label></div>
             <div><input type="radio" name="rank" value="4" {{ $user->rank == 4 ? ' checked="checked" ' : '' }}> <label class="radiolabel">Moderator</label></div>
            <div><input type="radio" name="rank" value="5" {{ $user->rank == 5 ? ' checked="checked" ' : '' }}> <label class="radiolabel">Admin</label></div>
            @if (Auth::user()->rank >= 7)
              <div><input type="radio" name="rank" value="6" {{ $user->rank == 6 ? ' checked="checked" ' : '' }}> <label class="radiolabel">Head Admin</label></div>
               <div><input type="radio" name="rank" value="7" {{ $user->rank == 7 ? ' checked="checked" ' : '' }}> <label class="radiolabel">Developer</label></div>
             @endif
             @if (Auth::user()->rank >= 8)
              <div><input type="radio" name="rank" value="8" {{ $user->rank == 8 ? ' checked="checked" ' : '' }}> <label class="radiolabel">Founder</label></div>
            @endif
          </div>
        </div>

        <label>Unique options</label>
          <div class="checkbox_wrapper">
          <div class="checkbox"><input type="checkbox" name="builder" {{ $user->builder ? ' checked="checked" ' : '' }}> <label class="radiolabel">Builder Team</label></div>
          <div class="checkbox"><input type="checkbox" name="event" {{ $user->event ? ' checked="checked" ' : '' }}> <label class="radiolabel">Event Team</label></div>
          <div class="checkbox"><input type="checkbox" name="staff" {{ $user->staff ? ' checked="checked" ' : '' }}> <label class="radiolabel">Staff Member</label></div>
        </div>

	      <input type="submit" class="button" />
        <a href="/users/{{$user->id}}">back</a>
	    </form>
	  </div>

  </div>

  <div class="side_container">
    <div class="form_center_v">
      <img src="/img/avatars/{{ $user->avatar }}" alt="user" class="form_img" />
    </div>
  </div>
@endsection