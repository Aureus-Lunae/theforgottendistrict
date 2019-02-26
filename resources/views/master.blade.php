@php
//ip address of you server
$ip = "144.217.115.102";
//port of your minecraft server
$port = 25565;

// create a connection using the fsockopen function

$coonectionStream = @fsockopen( $ip, $port, $errno, $errstr, 2);

//check if the connection worked and the server is online

if($coonectionStream >= 1) {
	$online = true;
	fclose($coonectionStream);
	//echo out information if server is online
	} else {
		$online = false;
	}
@endphp

<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="UTF-8" />
	<meta name="description" content=" " />
	<meta name="keywords" content=" " />
	<meta name="author" content="Erwin Korsten" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/main.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Laila|Montserrat:400,700" rel="stylesheet">
	<title>@yield('title', 'The Forgotten District')</title>
</head>

<body>
	<div class="page_wrapper">
		<div class="header_wrapper">
			<div class="banner">
				<div class="status">
					Server:
					@php
					if ($online) {
					echo '<span class="online"> Online </span>';
					} else {
					echo '<span class="offline"> Offline </span>';
					}
					@endphp
				</div>
				<div class="ip">
					IP: 144.217.115.102
				</div>
			</div>
			<div class="navigation">
				<div id="nav_title">
					The Forgotten District
				</div>
				<ul class="nav_links">
					<li><a href="/">Home</a></li>
					<li>
						<input id="info" type="checkbox" name="info"/>
						<label for="info">Info</label>
						<ul class="submenu">
							<li><a href="/">Staff</a></li>
							<li><a href="/">Rules</a><
						</ul>
					</li>
					<li><a href="/">SWR</a></li>
					<li><a href="/">Support Us</a></li>

					@guest
						<li><a href={{ route('login') }}>{{ __('Login') }}</a></li>
						@if (Route::has('register'))
							<li><a href={{ route('register') }}>{{ __('Register') }}</a></li>
						@endif
					@else
					<li> 
						<input id="usermenu" type="checkbox" name="usermenu"/>
						<label for="usermenu">{{ Auth::user()->name }} </label>
						<ul class="submenu">
							<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
							</li>
						</ul>
					</li>
					@endguest

				</ul>
			</div>
		</div>

		<div class="content_wrapper">
			@yield('content')
		</div>

		<div id="particles-js"></div>

	</div>

	<script src="js/particles.js"></script>
	<script src="js/particlesapp.js"></script>
</body>

</html>
