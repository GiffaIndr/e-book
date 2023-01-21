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
            <a href="{{route('landing')}}">home</a>
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
</section>
<section class="product" id="book">
    <h1 style="padding-top:100px" class="heading">  <span>Categories</span> komik</h1>
    <hr>
    <div class="btn-group" style="margin-left:93%;">
        <button type="button" class="btn" style="background-color: #04d9c7; color:white;">Category</button>
        <button type="button" style="background-color: #04d9c7; color:white;" class="btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
          <span class="visually-hidden">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{route('komik')}}">Komik</a></li>
          <li><a class="dropdown-item" href="{{route('novel')}}">Novel</a></li>

        </ul>
      </div>
    <div class="box-container">
        @foreach($commers as $commer)
        <div class="box">
            <div class="image">
                <img src="{{asset('assets/img/'. $commer->image)}}" alt="">
            </div>
            <div class="content">
                <h3>{{$commer->buku}}</h3>
                <div class="price">penulis: {{$commer->penulis}}</div>
                <div class="stars">Penerbit: {{$commer->penerbit}}
                </div>
                <div><b>genre: {{$commer->genre}}</b></div>
               
                  <br>
                <a href="{{route('screen', $commer->id)}}" class="fas fa-eye"></a>
            </div>
        </div>
        @endforeach
    </div>
    <br>
 
</section>

</body>
@yield('content')
</html>