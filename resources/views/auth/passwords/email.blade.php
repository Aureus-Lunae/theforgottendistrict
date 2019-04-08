@extends('master')

@section('content')
  <div class="form_container">
    <div class="form_width">

      <h2>{{ __('Reset Password') }}</h2>

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

      @if (session('status'))
        <div class="alert alert_success" role="alert">
          {{ session('status') }}
        </div>
      @endif

      <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <label for="email">{{ __('E-Mail Address') }}</label>

        <input id="email" type="email" name="email" value="{{ old('email') }}" required>

        <Input type="submit" class="button" value="{{ __('Send Password Reset Link') }}" />

      </form>

    </div>
  </div>

  <div class="side_container">
    <div class="form_center_v">
      <img src="/img/site/iron_door.svg" alt="door" class="form_img" />
    </div>
  </div>

@endsection
