<!doctype html>
<html lang="en">

<head>
		<!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="Unify Admin Panel" />
		<meta name="keywords" content="Admin, Dashboard, Bootstrap4, Sass, CSS3, HTML5, Responsive Dashboard, Responsive Admin Template, Admin Template, Best Admin Template, Bootstrap Template, Themeforest" />
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="shortcut icon" href="img/favicon.ico" />
		<title>@yield('title')</title>

		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

		<!-- Common CSS -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('fonts/icomoon/icomoon.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/main.css') }}" />

		<!-- Other CSS includes plugins - Cleanedup unnecessary CSS -->
		<!-- Chartist css -->
		<link href="{{ asset('css/chartist.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/chartist-custom.css') }}" rel="stylesheet" />

        @yield('stylesheet')

	</head>
	<body>

		<!-- Loading starts -->
		<div id="loading-wrapper">
			<div id="loader">
				<div class="line1"></div>
				<div class="line2"></div>
				<div class="line3"></div>
				<div class="line4"></div>
				<div class="line5"></div>
				<div class="line6"></div>
			</div>
		</div>
		<!-- Loading ends -->

		<!-- BEGIN .app-wrap -->
		<div class="app-wrap">
			<!-- BEGIN .app-heading -->

            @include('partials._header')

			<!-- END: .app-heading -->
			<!-- BEGIN .app-container -->
			<div class="app-container">
				<!-- BEGIN .app-side -->

                @include('partials._nav')

				<!-- END: .app-side -->

				<!-- BEGIN .app-main -->
				<div class="app-main">
					<!-- BEGIN .main-heading -->
					<header class="main-heading">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
									<div class="page-icon">
										<i class="icon-laptop_windows"></i>
									</div>
									<div class="page-title">
										<h5>@yield('title')</h5>
										<h6 class="sub-heading">Welcome to Unify Admin Template</h6>
									</div>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
									<div class="right-actions">
										<a href="#" class="btn btn-primary float-right" data-toggle="tooltip" data-placement="left" title="Download Reports">
											<i class="icon-download4"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</header>
					<!-- END: .main-heading -->
					<!-- BEGIN .main-content -->
					<div class="main-content">

                        @yield('content')

					</div>
					<!-- END: .main-content -->
				</div>
				<!-- END: .app-main -->
			</div>
			<!-- END: .app-container -->
			<!-- BEGIN .main-footer -->
			<footer class="main-footer fixed-btm">
				Copyright Unify Admin 2017.
			</footer>
			<!-- END: .main-footer -->
		</div>
		<!-- END: .app-wrap -->

		<!-- jQuery first, then Tether, then other JS. -->
		<script src="{{ asset('js/jquery.js') }}"></script>
		<script src="{{ asset('js/tether.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/unifyMenu.js') }}"></script>
		<script src="{{ asset('js/onoffcanvas.js') }}"></script>
		<script src="{{ asset('js/moment.js') }}"></script>

		<!-- Slimscroll JS -->
		<script src="{{ asset('js/slimscroll.min.js') }}"></script>
		<script src="{{ asset('js/custom-scrollbar.js') }}"></script>

		<!-- Chartist JS -->
		{{-- <script src="{{ asset('js/chartist.min.js') }}"></script>
		<script src="{{ asset('js/chartist-tooltip.js') }}"></script>
		<script src="{{ asset('js/custom-line-chart.js') }}"></script>
		<script src="{{ asset('js/custom-line-chart1.js') }}"></script>
		<script src="{{ asset('js/custom-area-chart.js') }}"></script>
		<script src="{{ asset('js/donut-chart2.js') }}"></script>
		<script src="{{ asset('js/custom-line-chart4.js') }}"></script> --}}

		<!-- Common JS -->
        <script src="{{ asset('js/common.js') }}"></script>

        @yield('javascript')

	</body>

</html>
