<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BAGAHOLIC</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ URL::asset('/css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{{ URL::asset('/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"> -->
  <link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative:900|Expletus+Sans:600|Merriweather:700" rel="stylesheet">

  <style>
          .perboxcenter {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 5px;
            background-color: white;
            box-shadow: 0 4px 6px 0 hsla(0,0%,0%, 0.2);
          }

          .imageneration { opacity: 0.6; transition: 0.3s;}

          .imageneration:hover {opacity: 1}

          .lobofont {
            font-family: 'Merriweather', serif;
            font-family: 'Cinzel Decorative', cursive;
            font-family: 'Expletus Sans', cursive;
            font-size: 2em;
            text-align: center;
          }

  </style>
</head>
<body>
  

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center blue-grey-text text-lighten-4" style="position: relative; top: 80px; font-weight: bolder; font-family: 'Libre Baskerville', serif; text-shadow: 2px 2px #0f1626;">BAGAHOLIC</h1>
        <div class="row center">
          <h5 class="header col s12 light" style="position: relative; top: 80px; font-weight: bolder; color: #f5f5f5; text-shadow: 2px 2px #0f1626;">Boldness and elegance within your grasp</h5>
        </div>
        <div class="row center">
            <div class="search-container" style="position: relative; top: 80px;">
                    

                    <form action='{{url("searchitems")}}' method='POST'>
                        {{ csrf_field() }}
                      <div class="row">
                        
                        <div class="col s6 offset-s3">
                              <input type="search" placeholder="Search.." name="search" style="background-color: #f5f5f5; box-shadow: 0 4px 6px 0 hsla(0,0%,0%, 0.2);">
                        </div>
                        <div class="col s1"> 
                              <button type="submit" class="btn-floating btn-large black pulse" style=" position: relative; top: -5px; left: -10px"><i class="fa fa-search" style="font-size: 35px;"></i></button>
                        </div>
                      
                      </div>
                    </form>
            </div>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="{{ URL::asset('/css/background1.jpg') }}" alt="Unsplashed background img 1"></div>
  </div>

    
    <div class="section" style="padding: 1px 0; margin: 0;">

      
      <!--   Icon Section   -->
      <div class="row" style="padding: 0; margin: 0;">
        
      <a href='{{url("watches")}}'>  
      <div class="col s6 imageneration" style="background-image: url('{{url('/css/1a.jpg')}}'); height: 200px; position: relative;">
        
          <div class="perboxcenter lobofont">Watches/Jewelries</div>
        
      </div>
     </a>
        <?php $category="Accessories"; ?>
        <a href='{{url("category/$category")}}'>  
      <div class="col s6 imageneration" style="background-image: url('{{url('/css/1b.jpeg')}}'); height: 200px; position: relative;">
        
          <div class="perboxcenter lobofont">Accessories</div>
        
      </div>
        </a>

        <?php $category="Bags"; ?>
        <a href='{{url("category/$category")}}'>  
      <div class="col s6 imageneration" style="background-image: url('{{url('/css/1c.jpeg')}}'); height: 200px; position: relative;">
        
          <div class="perboxcenter lobofont">Bags</div>
        
      </div>
        </a>

        <?php $category="Luggages"; ?>
        <a href='{{url("category/$category")}}'>
      <div class="col s6 imageneration" style="background-image: url('{{url('/css/1e.jpeg')}}'); height: 200px; position: relative;">
        
          <div class="perboxcenter lobofont">Luggages</div>
        
      </div>
        </a>

        <?php $category="Footwears"; ?>
        <a href='{{url("category/$category")}}'>
      <div class="col s6 imageneration" style="background-image: url('{{url('/css/1d.jpeg')}}'); height: 200px; position: relative;">
        
          <div class="perboxcenter lobofont">Footwears</div>
        
      </div>
        </a>

        

        <?php $category="Wallets"; ?>
        <a href='{{url("category/$category")}}'>
      <div class="col s6 imageneration" style="background-image: url('{{url('/css/1f.jpg')}}'); height: 200px; position: relative;">
        
          <div class="perboxcenter lobofont">Wallets</div>
        
      </div>
        </a>

      



      

    </div> 
      

      

    </div>




<!--  Scripts-->
  <script src="{{ URL::asset('https://code.jquery.com/jquery-2.1.1.min.js') }}"></script>
  <script src="{{ URL::asset('/js/materialize.js') }}"></script>
  <script src="{{ URL::asset('js/init.js') }}"></script>

  <script>
    $('.carousel.carousel-slider').carousel({
    fullWidth: true
  });
  </script>
</body>
</html>