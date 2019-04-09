<div class="header_wrapper">
	<div class="banner">
		<div class="ip">
			IP: play.theforgottendistrict.com
		</div>
	</div>
	{{-- Navigation --}}
	<div class="navigation">

		<div id="nav_logo">
			<img src="/img/tfd_logo.svg" />
		</div>
		<input class="menu_toggle" type="checkbox" id="menu_toggle">
		<label class="menu_button" for="menu_toggle"><span></span></label>

		<ul class="nav_links">
			<li><a href="/"><i class="fas fa-home"></i> Home</a></li>
			<li>
				<input class="subtoggle" id="info" type="checkbox" name="info" />
				<label for="info"><i class="fas fa-caret-down"></i> Server Info</label>
				<ul class="submenu">
					<li><a href="/events"><i class="fas fa-calendar-week"></i> Events</a></li>
					<li><a href="/staff"><i class="fas fa-users"></i> Staff</a></li>
					<li><a href="/rules"><i class="fas fa-gavel"></i> Rules</a></li>
				</ul>
			</li>
			<li><a href="/support"><i class="fas fa-gift"></i> Support Us</a></li>

			{{-- Authorization Links --}}
			@guest
				<li><a href={{ route('login') }}><i class="fas fa-sign-in-alt"></i> {{ __('Login') }}</a></li>
				@if (Route::has('register'))
					<li><a href={{ route('register') }}><i class="fas fa-plus-circle"></i> {{ __('Register') }}</a></li>
				@endif
			@else
				<li>
					<input class="subtoggle" id="usermenu" type="checkbox" name="usermenu" />
					<label for="usermenu"><i class="fas fa-caret-down"></i>
						{{ Auth::user()->display_name }} </label>
					<ul class="submenu">
						<li><a href={{ route('profile') }}><i class="fas fa-user"></i> Profile</a></li>
						<li><a href="/dashboard/pm"><i class="fas fa-envelope"></i> PM</a></li>

						{{-- Logout --}}
						<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
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
