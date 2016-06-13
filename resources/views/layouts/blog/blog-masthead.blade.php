<div class="blog-masthead">
	<div class="container">
		<nav class="nav blog-nav">
			<a class="nav-link {{ request()->session()->get('cNavbar')=='' ? 'active' : '' }}" href="/">主页</a>
			@foreach($sNavbars as $aNavbar)
			<a class="nav-link {{ request()->session()->get('cNavbar')==$aNavbar['navbar'] ? 'active' : '' }}" href="{{ $aNavbar['navbar'] }}">{{ $aNavbar['title'] }}</a>
			@endforeach
			<a class="nav-link {{ request()->session()->get('cNavbar')=='about' ? 'active' : '' }}" href="/about">关于</a>
		</nav>
	</div>
</div>