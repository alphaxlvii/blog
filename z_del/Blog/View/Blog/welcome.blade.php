@extends('layouts.blog') @section('content')
@foreach($posts as $aPosts)
<div class="blog-post">
	<h2 class="blog-post-title"><a href="post{{ $aPosts['slug'] }}">{{ $aPosts['title'] }}</a></h2>
	<p class="blog-post-meta">
		December 14, 2013 by <a href="#">Chris</a>
	</p>

	<p>{{ $aPosts['content'] }}</p>
</div>
<!-- /.blog-post -->
@endforeach
<nav>
	<ul class="pager">
		<li><a href="#">Older</a></li>
		<li class="disabled"><a href="#">Newer</a></li>
	</ul>
</nav>
<!-- /.blog-post -->
@endsection
