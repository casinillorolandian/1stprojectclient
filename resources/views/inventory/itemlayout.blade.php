<!DOCTYPE html>  
<html>
<head>
	<title>Bagaholic</title>
	 <!-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/design.css') }}" > -->

	<!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrapsidebar/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative:900|Expletus+Sans:600|Merriweather:700" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
    <style>
      .imageneration { opacity: 0.6; transition: 0.3s;}

      .imageneration:hover {opacity: 1}

      .lobofont {
            font-family: 'Merriweather', serif;
            font-family: 'Cinzel Decorative', cursive;
            font-family: 'Expletus Sans', cursive;
            font-size: 2em;
            text-align: center;
            padding: 5px;
            background-color: white;
            box-shadow: 0 4px 6px 0 hsla(0,0%,0%, 0.2);
          }
    </style>
</head>
<body>
	<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper" style="top: 0px; z-index: 3;">

        	<form action='{{url("catalogue")}}' method="Post">

            {{ csrf_field() }}
                <ul class="sidebar-nav">
                	<div style="height:50px"></div>
                    <li class="sidebar-brand" style="border-bottom: 1px solid white">
                        
                        <h1>    <strong> Category </strong> </h1>
                        
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

		@yield("item_content")
        <hr>

        <!----------------------------  FOOTER ---------------------------------------------------------------- -->
        <div>
                  <div class="modal fade container-fluid" id="myModalbagaholic" role="dialog">
                  <div class="modal-dialog modal-lg">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">

                                <div class="row">
                                
                                  <div class="map col-md-3" style="background: white; position: relative;">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.8684890719574!2d121.02169231441623!3d14.549512182228277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c91a5b680457%3A0x1c14b68e860b0cba!2sBagaholic!5e0!3m2!1sen!2sph!4v1518751403724" width="150px" height="150px" frameborder="0" style="border:0" allowfullscreen></iframe>
                                  </div>

                                  <div class="col-md-9">
                                  <h5 style="text-align: left;">Bagaholic </h5>
                                  <h6 style="text-align: left;">Address: 2nd Floor 1014 Almeda Arcade Bldg., Arnaiz Ave., Makati City<br>
                                  Operating Hours: 10:00A.M. – 8:00P.M. (Monday to Sunday)<br>
                                  Telephone Numbers: (+632) 846-6950 / (+632) 986-4671<br>
                                  Mobile Number: +63917-814-1967<br>
                                  Email Address: bagaholic2009@yahoo.com</h6>
                                  </div>
                                </div>
                      </div>
                    </div>
                  </div>
        </div>

        <div class="modal fade container-fluid" id="myModalmwe" role="dialog">
                  <div class="modal-dialog modal-lg">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">

                                <div class="row">



                                  <div class="map col-md-3" style="background: white; position: relative;">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.8022375630803!2d121.018792414336!3d14.553298889832586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c90fe3d93cd5%3A0xec0ae9e80a5bd0e0!2sManila+Watch+Emporium!5e0!3m2!1sen!2sph!4v1518765063898" width="150px" height="150px" frameborder="0" style="border:0" allowfullscreen></iframe>
                                  </div>

                                  <div class="col-md-9">
                                  <h5 style="text-align: left;">Metro Watch Emporium Main </h5>
                                  <h6 style="text-align: left;">Address: Ground Floor Greenbelt 1, Paseo de Roxas Cor. Legaspi St., Makati City<br>
                                  Operating Hours: 10:00A.M. – 8:00P.M. (Monday to Sunday)<br>
                                  Telephone Numbers: (+632) 815-8908 / (+632) 893-0618<br>
                                  Mobile Number: +63917-813-1967<br>
                                  Email Address: manilawatch2009@yahoo.com</h6>
                                  </div>
                                </div>
                      </div>
                    </div>
                  </div>
        </div>

        <div class="modal fade container-fluid" id="myModalvmall" role="dialog">
                  <div class="modal-dialog modal-lg">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">

                                <div class="row">
                                
                                  <div class="map col-md-3" style=" background: white;">
                                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.9415063770175!2d121.04761981433663!3d14.60240798980128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b7d8c4afe7d3%3A0xc2e1ea06e5323ca!2sV-Mall!5e0!3m2!1sen!2sph!4v1518765774562" width="150px" height="150px" frameborder="0" style="border:0" allowfullscreen></iframe>
                                  </div>

                                  <div class="col-md-9">
                                  <h5 style="text-align: left;">Metro Watch Emporium (Vmall Branch) </h5>
                                  <h6 style="text-align: left;">Address: 2nd Floor Vmall (near bridge way to parking), Greenhills Shopping Center, San Juan<br>
                                  Operating Hours: 10:00A.M. – 8:00P.M. (Monday to Sunday)<br>
                                  Telephone Number: (+632) 725-4424<br>
                                  </h6>
                                  
                                  </div>
                                </div>
                      </div>
                    </div>
                  </div>
        </div>


        <div class="container-fluid">
          <div class="row" style="padding: 0 0 10px 0;">
            <div class="col" >
                <h1 class="gi-2x" style="text-align: center; font-weight: bolder">Visit Us</h1>
              <div class="content" style="height: 200px">
                
                <div class="buttons">
                  <div class="button" data-toggle="modal" data-target="#myModalbagaholic">BAGAHOLIC</div>
                  <div class="button" data-toggle="modal" data-target="#myModalmwe">MWE</div>
                  <div class="button" data-toggle="modal" data-target="#myModalvmall">V-MALL</div>
                </div>
              </div>
            </div>
            <div class="col">
                <h2 class="gi-2x" style="text-align: center; font-weight: bolder">Social Media</h2>
              <div class="content" style="height: 200px">
                
                <div class="footer-icons">
                  <div class="row">
                  <div class="col col-md-1 col offset-md-2">
                  <a href="https://www.facebook.com/" class="gi-3x" target="_blank"><i class="fa fa-facebook-square"></i></a>
                  </div>
                  <div class="col col-md-1 offset-md-1">
                  <a href="https://twitter.com/?lang=en" class="gi-3x" target="_blank"><i class="fa fa-twitter"></i></a>
                  </div>
                  <div class="col col-md-1 offset-md-1">
                  <a href="https://www.tumblr.com/login" class="gi-3x" target="_blank"><i class="fa fa-tumblr-square"></i></a>
                  </div>
                  <div class="col col-md-1 offset-md-1">
                  <a href="https://www.instagram.com/accounts/login/" class="gi-3x" target="_blank"><i class="fa fa-instagram "></i></a>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="content">

                <h5 style="text-align: center; margin-top: 15%;"> &copy; BAGAHOLIC 2018. ALL RIGHTS RESERVED.</h5>
              </div>
            </div>
            </div>
        </div>



        <div style="background-image: url(http://theartmad.com/wp-content/uploads/Dark-Grey-Texture-Wallpaper-5.jpg); height: 200px; z-index: -10">

            
        </div>
        </div>


        <!----------------------------  FOOTER ---------------------------------------------------------------- -->
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