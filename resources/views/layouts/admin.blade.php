<!doctype html>
<html>
<head>
	@include('admin.includes.head')
</head>
<body>
<div class="container">
	<header class="row" style="border: thin solid lime;">
		@include('admin.includes.header')
	</header>
	<div id="main" class="row" style="border: thin solid blue;">
		@yield('content')
	</div>
	<footer class="row" style="border: thin solid red;">
		@include('admin.includes.footer')
	</footer>
</div>
</body>

@yield('scripts')
</html>