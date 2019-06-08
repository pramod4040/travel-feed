<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="description" content="" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
		<meta name="robots" content="index, follow" />
		<title></title>

    <!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/front/css/ionicons.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/font-awesome.min.css')}}" />
    @stack('styles')



    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="/assets/front/images/fav.png"/>
	</head>
	<body>

    <!-- Header
    ================================================= -->
		<header id="header">
      <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">

          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('newsfeed')}}"><img src="/assets/front/images/loogo.png" alt="logo" /></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-menu">
              <!-- <li class="dropdown"><a href="#">Message</a></li> -->
             @if(\Auth::user())

             <form class="navbar-form navbar-right hidden-sm" method="get" action="{{route('searchItems')}}">
                        <div class="form-group">
                            <i class="icon ion-android-search"></i>
                            <input name="keywords" type="text" class="form-control" placeholder="Search places,  #hashtags">
                            <!-- <input type="submit" name="" value="Search"> -->
                        </div>
                    </form>

              <li class="dropdown"><a class="" href="{{route('destination.create')}}">Add Destination</a></li>
              
              @if(\Auth::user()->role == 'admin')
              <li class="dropdown"><a class="" href="{{route('adminindex')}}">Admin Pannel</a></li>
            @endif

            <li class="dropdown">
           <form action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                    <button class="btn btn-default btn-fla"> Logout </button>
                  <!-- <a href="#" class="btn btn-default btn-flat">Sign out</a> -->
                </form>
            </li>
            @endif
            </ul>
            <!-- <form class="navbar-form navbar-right hidden-sm">

              <div class="form-group">
                <i class="icon ion-android-search"></i>
                <input type="text" class="form-control" placeholder="Search places,  #hashtags">
              </div>
            </form> -->
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </header>
    <!--Header End-->
