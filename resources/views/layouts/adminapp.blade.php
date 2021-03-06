<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Bagaholic' }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="z-index: 5;">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/admin') }}">
                    {{ 'BAGAHOLIC' }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="search-container">
                    

                    <form action='{{url("searchitems")}}' method='POST'>
                        {{ csrf_field() }}
                      <input type="search" placeholder="Search.." name="search">
                      <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        
                <!-- ------------------------------------------------------------ -->
                        @if(Auth::guard('admin')->check())

                            <li>  
                             <img src="/{{ Auth::guard('admin')->user()->image }}" style="width:40px; height:40px; border-radius: 50%; margin-right:25px;"> <span style="color: rgba(0,0,0,.5); font-size: 1.0em; position: relative; top: 2px; right: 10px;">  {{ Auth::guard('admin')->user()->name }} </span>
                            </li>

                            

                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Catalogue') }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/catalogue">
                                        {{ __('Catalogue') }}
                                    </a>

                                    <a class="dropdown-item" href="/catalogue/create">
                                        {{ __('Catalogue Create') }}
                                    </a>
                                    
                                    <a class="dropdown-item" href="/reserveitem">
                                        {{ __('Catalogue Reserve') }}
                                    </a>
                                    
                                </div>
                            </li>
                            

                            <!-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Messages') }}
                                    <span style="color:darkred; font-weight:bold;">
                                    
                                    
                                    <i class="fa fa-envelope-o"></i>
                                    </span>


                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/messages">
                                        {{ __('Message') }}
                                    </a>

                                    <a class="dropdown-item" href="/messages/create">
                                        Create Message
                                    </a>
                                    
                                    <a class="dropdown-item" href="/messages/show/deletedmessages">
                                        Deleted Messages
                                    </a>
                                    <a class="dropdown-item" href="/messages/show/spammedmessages">
                                        Spammed Messages
                                    </a>
                                    
                                </div>
                            </li> -->

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                     Settings <i class="fa fa-cog"></i><span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/admin">
                                        Home
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{ url('/settings') }}"> View Users</a>
                                    
                                    

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            
                                </div>


                                

                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
