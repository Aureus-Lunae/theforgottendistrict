@extends('master')

@section('content')
<div class="container">
  <div class="form_container">
    <div>

      <h2>Register</h2>

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

      <form method="POST" action="{{ route('register') }}">
        @csrf

        <label>Username</label>
        <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus>

        @if ($errors->has('username'))
        <span class="alert alert_error" role="alert">
          <strong>{{ $errors->first('username') }}</strong>
        </span>
        @endif

        <label>{{ __('E-Mail Address') }}</label>

        <input id="email" type="email" name="email" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
        <span class="alert alert_error" role="alert">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif

        <label for="password">{{ __('Password') }}</label>

        <input id="password" type="password" name="password" required>

        @if ($errors->has('password'))
        <span class="alert alert_error" role="alert">
          <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif

        <label for="password-confirm">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" type="password" name="password_confirmation" required>

        <input type="submit" class="button" value="{{ __('Register') }}">

      </form>
    </div>
  </div>
</div>

<div class="side_container">
  <div class="form_center_v">
    <img src="/img/site/iron_bars.svg" alt="bars" class="form_img" />
  </div>
</div>

@endsection
