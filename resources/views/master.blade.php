<!doctype html>
<html lang="{{ __('messages.lang') }}" dir="{{ __('messages.dir') }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    {{----}}
    @livewireStyles
    <!--#
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <title>{{ $title ?? "welcome" }}</title>
        
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Navbar</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
        @if (Auth::check())
            <li class="nav-item">
                <a class="nav-link" href="{{route('product')}}">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('category')}}">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('vendor')}}">Vendors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('order')}}">Orders</a>
            </li>
            
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
        @endif
      
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>
    </ul>
    <!--<form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>-->
    <a class="btn btn-outline-success m-2" href="lang/en">English</a>
    <a class="btn btn-outline-success" href="lang/ar">??????????????</a>
    @if (Auth::check())
        <!--<a href="/profile" class="dropdown-menu">
            
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
        </a>-->
        <div class="dropdown">
            <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="rounded-circle" style=" height: 40px; " src="{{auth()->user()->info->avatar}}">
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">Profile ({{auth()->user()->name}})</a>
              <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </div>
    @endif
  </div>
</nav>
    <!-- navbar  -->
    
    {{-- content --}}
    @yield('content')
    
    {{-- content --}}
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('js/app.js')}}"></script>
    @livewireScripts    {{----}}
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        

    <scritp>
        <script>
            jQuery( document ).ready(function($){
                $('#searchbtn').click(function(){
                    $(this).attr('href',$(this).attr('href').replace('search-key', $('#search-value').val()));
                });
            });
        </script>
    </scritp>
    -->
  </body>
</html>