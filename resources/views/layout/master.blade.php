<!DOCTYPE html>
<html>
<head>

	<!-- START @HEADER JS -->
		@include('include._headerJs')
	<!--/ END HEADER JS-->

	<!-- START ON PAGE CSS  -->
		@stack('style')
	<!-- END ON PAGE CSS -->

</head>
<body>
	<section id="wrapper">

		<!-- START @HEADER -->
			@include('include._header')
		<!--/ END HEADER -->

		<!-- START @SIDEBAR LEFT -->
        	@include('include._sideBar')
        <!--/ END SIDEBAR LEFT -->

		<!-- START @PAGE CONTENT -->
        	@yield('content')
        <!--/ END PAGE CONTENT -->
	    
	</section>

	<!-- START @HEADER -->
		@include('include._footerJs')
	<!--/ END HEADER -->

	<!-- START ON PAGE JS  -->
		@stack('scripts')
	<!-- END ON PAGE JS -->

</body>
</html>