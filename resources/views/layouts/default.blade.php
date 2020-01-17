<!DOCTYPE html>
<html lang="en">
	<head>
		@include('layouts/head')
	</head>

	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">

            <div class="background-color" style="background-color: rgba(255, 137, 0, 0.15);"></div>
                <div class="content-wrapper" >
			    @yield('content')
    			</div>
			</div>

			@yield('styles')
			@yield('scripts')
			@yield('chat')

		</div>
	</body>
</html>
