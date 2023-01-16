<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('assets/css/landing.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
    
    <link href="{{asset('assets/css/screen.css')}}" rel="stylesheet" type="text/css">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
  />
  
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <title>Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<style>
    *{
        text-decoration: none !important;
    }
</style>


<body>
    <header class="header">
        <a href="#" class="logo"> <i class="fas "></i>WIK<span>Book</span> </a>
        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#product">Populer</a>
            <a href="#about">Buku</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a>
        </nav>
        @Auth
        <div class="icons">
            {{-- <div class="fas">Lihat Buku</div> --}}
            <div  class="fas fa-user"> {{Auth::user()->name}}</div>
        </div>
        <div class="shopping-cart">
            <a href="#" class="btn">checkout</a>
        </div>
        <nav class="navbar">
            <a href="{{route('logout')}}">logout</a>
        </nav>
        
@else

<nav class="navbar">
<a href="{{route('login')}}">login</a>
</nav>
@endauth

    </header>
</body>
@yield('content')
</html>