@extends('master')

@section('content')
  <div class="form_container">
    <div class="form_width">

      <h2>Login</h2>

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

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <label>{{ __('E-Mail Address') }}</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

        <label for="password">{{ __('Password') }}</label>
        <input id="password" type="password" name="password" required>

        <div class="checkbox_wrapper">
          <div class="checkbox">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember" class="radiolabel">
              {{ __('Remember Me') }}
            </label>
          </div>
        </div>

        <input type="submit" class="button" value="{{ __('Login') }}">

        @if (Route::has('password.request'))
          <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
          </a>
        @endif

      </form>
    </div>
  </div>

  <div class="side_container">
    <div class="form_center_v">
      <img src="/img/site/iron_door.svg" alt="door" class="form_img" />
    </div>
  </div>
@endsection
