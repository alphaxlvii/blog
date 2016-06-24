<div class="blog-masthead">
	<div class="container">
		<nav class="nav blog-nav">
			<div class="pull-left" style="width: 80%">
    			<a class="nav-link {{ request()->session()->get('cNavbar')=='' ? 'active' : '' }}" href="/">主页</a>
    			@foreach($sNavbars as $aNavbar)
    			<a class="nav-link {{ request()->session()->get('cNavbar')==$aNavbar['navbar'] ? 'active' : '' }}" href="{{ $aNavbar['navbar'] }}">{{ $aNavbar['title'] }}</a>
    			@endforeach
				<a class="nav-link {{ request()->session()->get('cNavbar')=='about' ? 'active' : '' }}" href="/about">关于</a>
			</div>        
		     <!-- #section:basics/navbar.dropdown -->
			<div class="pull-right" role="navigation" style="width: 20%">
				<ul class="nav navbar-nav navbar-right">
	               <!-- #section:basics/navbar.user_menu -->
					@if (Auth::guest())
					<li><a href="{{ url('/login') }}">Login</a></li>
					<li><a href="{{ url('/register') }}">Register</a></li>
					@else
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('/logout') }}"><i class="ace-icon fa fa-power-off"></i>Logout</a></li>
						</ul>
					</li>
					@endif
					<!-- /section:basics/navbar.user_menu -->
				</ul>
			</div><!-- /section:basics/navbar.dropdown -->
		
		</nav>
		
	</div>
</div>