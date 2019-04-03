@extends('layouts.full')

@section('content')

<div class="home_page">

  <div class="info_box">
    <div class="img_container">
      <img src="/img/tfd_logo.svg" />
    </div>
    <div class="markdown homelinks">
      @markdown
## Verify Your Email Address

Before proceeding, please check your email for a verification link.

[Resend email]({{ route('verification.resend') }})
      @endmarkdown

      @if (session('resent'))
        <div class="alert alert_success" role="alert">
          A fresh verification link has been sent to your email address.
        </div>
      @endif
    </div>
  </div>
</div>

@endsection
