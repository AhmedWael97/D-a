<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>E - Commerece</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">


    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">





    <!-- swiper v3.3 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css">


    <!--  -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/creative.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet">

    <style type="text/css">
        .mainColor
        {
            color:#3498db;
        }
        .mainColorbackground
        {
            background-color: #3498db;
        }
        .mainColorHover:hovor
        {
            color:#3498db;
        }
    </style>
</head>
<body >
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel ">
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="#" style="display: inline-block;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="nav-link" href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="nav-link" href="#">
                        <i class="fab fa-google"></i>
                    </a>
                    <a class="nav-link" href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                  </li>
                </ul>
              </div>

              <form class="form-inline my-2 my-lg-0">
                <input type="text" class="form-control Input-Style3" placeholder="Search" aria-label="Password" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2-form">
                        <i class="fas fa-search"></i>
                    </button>
                  </div>
              </form>
        </nav>
       <div class="row SecondNav">
            <div class="col-lg-3">
                <a href="{{url('/')}}/" class="logo">
                    logo here
                </a>
            </div>
            <div class="col-lg-6">
                <ul class="nav justify-content-center">
                    <li class="">
                        <a class="nav-link active" href="{{url('/')}}/">Home</a>
                    </li>
                    <li class="">
                        <a class="nav-link" href="{{url('/')}}/categories">Categories</a>
                    </li>
                    <li class="">
                        <a class="nav-link" href="#">Category1</a>
                    </li>
                    <li class="">
                        <a class="nav-link" href="#">Category2</a>
                    </li>
                    <li class="">
                        <a class="nav-link" href="#">Category3</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3" style="text-align: right;padding-right: 50px;">
               <a href="{{url('/')}}/cart"> <i class="fas fa-shopping-cart" style="font-size: 20px;
    padding-top: 10px;" id="button-addon2-form"></i></a>
            </div>
          
       </div>

        <main class="py-4">
                
            @yield('content')
        </main>
    </div>
<div class="main-footer">
    <div class="text-center mainly-footer">
        <h1 class="footer-main-header">E-COMMERCE</h1>
        <span>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-google"></i></a>
            <a href="#"><i class="far fa-envelope"></i></a>
        </span>
    </div>
    <div class="container">
       <div class="row">
        <div class="col-md-4">
            <h4>About Us</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
        </div>
        <div class="col-md-4 text-center">
          
                
            
        </div>
        <div class="col-md-4" style="overflow-x: hidden;">
            <h4>Customers Opinions</h4>
             <div class="swiper-container6">
                <div class="swiper-wrapper">
                  <div class="swiper-slide" style="background-color: transparent;cursor: pointer">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  </div>
                  <div class="swiper-slide" style="background-color: transparent;cursor: pointer">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  </div>
                  <div class="swiper-slide" style="background-color: transparent;cursor: pointer">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  </div>
                  
                </div>
              </div>
        </div>
    </div> 
     <hr style="border-color:white;border-width: 1px;width: 20%">
     <div class="row">
         <div class="col-md-6">
             Smart Geeks © 2016 All Rights Reserved. 
         </div>
         <div class="col-md-6 smart-icons" style="text-align: right;">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-google"></i></a>
            <a href="#"><i class="far fa-envelope"></i></a>
         </div>
     </div>
    </div>
</div>
                    
<script src="{{url('/')}}/js/swiper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="{{ asset('js/slick.js') }}"></script>
<script src="{{ asset('js/mixitup.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
