<!DOCTYPE html>  
<html>
<head>
	
	 <!-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/design.css') }}" > -->

	<!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrapsidebar/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
</head>
<body>
	<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper" style="top: 0px; z-index: 3;">

        	<form action='{{url("catalogue")}}' method="Post">

            {{ csrf_field() }}
                <ul class="sidebar-nav">
                	<div style="height:50px"></div>

                    <li class="sidebar-brand">
                        <h1>    <strong> <a href='{{url("catalogue")}}'> Catalogue </a> </strong> </h1>
                    </li>
                    
                    



                    <li class="sidebar-brand" style="border-bottom: 1px solid white">
                        
                    </li>
                        <input type="hidden" name='category[]' value="0" checked="checked">
                    <!-- <li style="border-bottom: 1px solid white">
                        <input type="checkbox" name='category[]' value="Watches"> <strong> Watches/Jewelries </strong>
                    </li> -->
                    <li style="border-bottom: 1px solid white">
                        <input type="checkbox" name='category[]' value="Accessories"><strong> Accessories</strong>
                    </li>
                    <li style="border-bottom: 1px solid white">
                        <input type="checkbox" name='category[]' value="Bags"><strong>Bags</strong>
                    </li>
                    <li style="border-bottom: 1px solid white">
                        <input type="checkbox" name='category[]' value="Luggages"><strong> Luggages</strong>
                    </li>
                    <li style="border-bottom: 1px solid white">
                        <input type="checkbox" name='category[]' value="Footwears"><strong> Footwears</strong>
                    </li>
                    <li style="border-bottom: 1px solid white">
                        <input type="checkbox" name='category[]' value="Wallets"><strong> Wallets</strong>
                    </li>
                    <li style="padding-top: 10px;">
                        <input type="submit" value="FIND BY CATEGORY" class="btn">
                    </li>
                </ul>
            </form>
        </div>
        <!-- /#sidebar-wrapper -->

    
    <!-- /#wrapper -->

    <!-- The things need to be inserted -->

	<div>
		<a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle" style="position: -webkit-sticky; position: sticky; top: 0; opacity: 0.8; z-index: 3;"><i class="fa fa-th-large"></i></a>

		@yield("homecontent")
		@extends('layouts.footer')
	</div>

	<!-- end of those things inserted -->


	</div>


	<div>

	<!-- Bootstrap core JavaScript -->
    <script src="{{ asset('jquerysidebar/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrapsidebar/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

	
	</div>

	

</body>
</html>