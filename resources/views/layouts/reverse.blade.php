<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="UTF-8" />
	<meta name="description" content=" " />
	<meta name="keywords" content=" " />
	<meta name="author" content="Erwin Korsten" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="/css/main.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Laila|Montserrat:400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<meta name="theme-color" content="#471540">
	<title>@yield('title', 'The Forgotten District')</title>
</head>

<body>
	<div class="page_wrapper">
		@include('layouts.header')

		<div class="reverse_content_wrapper">
			@yield('content')
		</div>

		@include('layouts.footer')

		<div id="particles-js"></div>
	</div>
	<script src="/js/particles.js"></script>
	<script src="/js/particlesapp.js"></script>
</body>

</html>
