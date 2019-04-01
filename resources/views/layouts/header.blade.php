<div class="header_wrapper">
	<div class="banner">
		<div class="ip">
			IP: play.theforgottendistrict.com
		</div>
	</div>
	{{-- Navigation --}}
	<div class="navigation">
		{{-- <div id="nav_title">
					The Forgotten District
				</div> --}}
		<div id="nav_logo">
			<img src="/img/tfd_logo.svg" />
		</div>
		<input class="menu_toggle" type="checkbox" id="menu_toggle">
		<label class="menu_button" for="menu_toggle"><span></span></label>
		<ul class="nav_links">
			<li><a href="/">Home</a></li>
			<li>
				<input id="info" type="checkbox" name="info" />
				<label for="info">Server Info</label>
				<ul class="submenu">
					<li><a href="/events">Events</a></li>
					<li><a href="/staff">Staff</a></li>
					<li><a href="/rules">Rules</a></li>
				</ul>
			</li>
			<li><a href="/">Support Us</a></li>
			{{-- Authorization Links --}}
			@guest
				<li><a href={{ route('login') }}>{{ __('Login') }}</a></li>
				@if (Route::has('register'))
					<li><a href={{ route('register') }}>{{ __('Register') }}</a></li>
				@endif
			@else
				<li>
					<input id="usermenu" type="checkbox" name="usermenu" />
					<label for="usermenu">
						{{ Auth::user()->display_name }} </label>
					<ul class="submenu">
						<li><a href={{ route('profile') }}>Profile</a></li>
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
