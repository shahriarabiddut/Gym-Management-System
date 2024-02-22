<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> @yield('title') | @isset($SiteOption)
        {{ $SiteOption[0]->value }}
    @endisset </title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/styles.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/fullcalendar.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/matrix-style.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/matrix-media.css')}}" />
    <link href="{{ asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{ asset('font-awesome/css/font-awesome4.css')}}" rel="stylesheet" />
    <link href="{{ asset('font-awesome/css/font-awesome4.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/jquery.gritter.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link href="{{ asset('font-awesome/css/all.css') }}" rel="stylesheet" />
    
    <link rel="stylesheet" href="{{ asset('css/jquery.gritter.css') }}" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    </head>
<body>
    <!--Header-part-->
    <a href="{{ route('admin.dashboard') }}">
<div id="header">
   <h1>@isset($SiteOption)
    {{ $SiteOption[0]->value }}
@endisset </h1>
</div>
</a>
  <!--close-Header-part--> 
  
  
  <!--top-Header-menu-->
  <div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav right">
      <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="fas fa-user-circle"></i>  <span class="text">Welcome {{ Auth::guard('admin')->user()->name }}</span><b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#"><i class="fas fa-user"></i> My Profile</a></li>
          <li class="divider"></li>
          <li><a href="#"><i class="fas fa-check"></i> My Tasks</a></li>
          <li class="divider"></li>
          <li><a href="{{ route('admin.logout') }}"><i class="fas fa-key"></i> Log Out</a></li>
        </ul>
      </li>
      
      <li class=""><a title="" href="{{ route('admin.logout') }}"><i class="fas fa-power-off"></i> <span class="text">Logout</span></a></li>
    </ul>
    </div>