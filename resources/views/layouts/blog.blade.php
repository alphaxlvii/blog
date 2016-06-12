<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="{{ $sSite['description'] }}">
  <meta name="author" content="{{ $sSite['author'] }}">
  <meta name="keywords" content="{{ $sSite['keywords'] }}">
  <link rel="icon" href="../../favicon.ico">
    
  <title>{{ $sSite['sitename'] }}</title>

  <!-- Fonts -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
  <link href="http://fonts.useso.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('plugins/bootstrap/bootstrap-4.0.0-alpha/dist/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="{{ asset('assets/css/blog/blog.css') }}">

  <style>
  body {
	font-family: 'Lato';
  }

  .fa-btn {
	margin-right: 6px;
  }
  </style>
</head>
<body>
	<!-- #section:basics/banner.layout -->
	<!-- /section:basics/banner.layout -->

	<!-- #section:blog/blog-masthead.layout -->
	@include('layouts.blog.blog-masthead')
	<!-- /section:blog/blog-masthead.layout -->

	<!-- #section:blog/blog-header.layout -->
	@include('layouts.blog.blog-header')
	<!-- /section:blog/blog-header.layout -->

	<div class="container">

		<div class="row">

			<div class="col-sm-8 blog-main">@yield('content')</div>
			<!-- /.blog-main -->

			<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
				<!-- #section:blog/blog-sidebar.layout -->
				@include('layouts.blog.blog-sidebar')
				<!-- /section:blog/blog-sidebar.layout -->
			</div>
			<!-- /.blog-sidebar -->

		</div>
		<!-- /.row -->

	</div>
	<!-- /.container -->

	<!-- #section:blog/blog-footer.layout -->
	@include('layouts.blog.blog-footer')
	<!-- /section:blog/blog-footer.layout -->

	<!-- JavaScripts -->
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="{{ asset('plugins/bootstrap/bootstrap-4.0.0-alpha/dist/js/bootstrap.min.js') }}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="http://v3.bootcss.com/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
