<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> @yield('title') {{ config('app.name', 'Captura') }}</title>

		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome Icons -->
		<link rel="stylesheet" href="{{ url('vendor/fontawesome-free/css/all.min.css') }}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{ url('vendor/adminlte/dist/css/adminlte.min.css') }}">
		
		<!-- Scripts -->
		
	</head>
	<body class="" style="height: auto;">
		<div class="wrapper">
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<!-- Left navbar links -->
				@include('layouts.mhorizontal')

				<!-- Right navbar links -->
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" data-widget="fullscreen" href="#" role="button">
						<i class="fas fa-expand-arrows-alt"></i>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
						<i class="fas fa-th-large"></i>
						</a>
					</li>
				</ul>
			</nav>
			<!-- /.navbar -->

			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<!-- Brand Logo -->
				<a href="{{ route('welcome') }}" class="brand-link">
					<img src="{{ asset('image/logo.png') }}" alt="Ventas" class="brand-image img-circle elevation-3" style="opacity: .8">
					<span class="brand-text font-weight-light">Ventas</span>
				</a>

				@include('layouts.mvertical')

			</aside>
			
			@yield('content')

			<!-- Main Footer -->
			<footer class="main-footer">
				<!-- Default to the left -->
				<strong><script>document.write(new Date().getFullYear())</script> © Capturas.</strong> All rights reserved.
			</footer>
		</div>
		@vite(['resources/sass/app.scss', 'resources/js/app.js'])

		<!-- jQuery -->
		<script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>
		<!-- Bootstrap 4 -->
		<script src="{{ url('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<!-- AdminLTE App -->
		<script src="{{ url('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
		
		@yield('script')
	</body>
</html>