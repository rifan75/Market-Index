<!DOCTYPE html>
<html lang="en">
<head>
	@include('partials.head')
</head>
<body>
	@include('partials.nav')

	<div id="wrapper">

		@if (Auth::user())
		<!-- Sidebar -->
		<div id="sidebar-wrapper">
			@include('partials.sidebar')
		</div>
		@endif
		<!-- /#sidebar-wrapper -->

		<!-- Page Content -->
		<div id="page-content-wrapper">

			@section('alerts')
				@include('alerts')
			@show

			@yield('top-content')

			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12">
						@yield('content')
					</div>
				</div>
			</div>


		</div>
	</div>
	<!-- /#page-content-wrapper -->


	@include('partials.footer')

	@include('partials.scripts')
</body>
</html>
