<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/app.css">
	<title>@yield('title','Sample App')- Laravel 新手入门教程</title>
</head>
<body>
	@include('layouts._header')
	<div class="container">
        @yield('content')
        @include('layouts._footer')
    </div>
</body>
</html>