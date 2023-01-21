@extends('layout.layout')
@section('content')

<div class="icons">
    <div id="cart-btn" class="fas fa-shopping-cart"></div>
    <div class="fas fa-search" id="search-btn"></div>
    <div id="login-btn" class="fas fa-user"></div>
    <div id="menu-btn" class="fas fa-bars"></div>
</div>

</header>
<section class="home" style="    background: url({{asset('assets/img/ebook.gif')}});" id="home">
<div class="content">
    <h3>WIK<span>Book</span> </h3>
    <h2>Baca<span> Buku</span> ONLINE </h2>
    @if (session('notAllowed'))
    <div class="alert alert-success opacity-100">
        {{ session('notAllowed') }}
    </div>
    @endif
    {{-- @if(Auth::user()->role == 'admin')
    <a href="{{route('dashboard.admin')}}" class="btns">Dashboard</a>
    @endif --}}
</div>
</section>
<br>
<h1 class="heading">  <span>Most</span> Favorite</h1>
<section class="banner-container" id="favorite">
<div class="container2"> 
    <div class="testimonial mySwiper">
        <div class="testi-content swiper-wrapper">
            @foreach($commers as $other)
          <div class="slide swiper-slide">
            <div class="banner">
                <img style=" height: 700px;" src="{{asset('assets/img/'. $other->image)}}" alt="">
                <div class="content">
                    <h3 style="color: white">TOP#<b style="font-size:50px">{{$loop->iteration}}</b></h3>
                    <span style="color: rgb(7, 234, 255)">{{$other->genre}}</span>
                    <h3 style="color: rgb(255, 255, 255)">{{$other->buku}}</h3>
                    <a href="{{route('screen', $other->id)}}" class="btns">Baca Sekarang</a>
                </div>
            </div>
          
        </div>
        
        @endforeach
    </div>
    
</section>
<section class="product" id="buku">
    <h1 class="heading">  <span>All</span> Books</h1>
    <hr>
    <div class="btn-group" style="margin-left:93%;">
        <button type="button" class="btn" style="background-color: #04d9c7; color:white;">Category</button>
        <button type="button" style="background-color: #04d9c7; color:white;" class="btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
          <span class="visually-hidden">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
          @foreach($commers as $commer)
      

          <li><a class="dropdown-item" href="{{route('filter', $commer->genre)}}">{{$commer->genre}}</a></li>
          
          @endforeach
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

<script> var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    grabCursor: true,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
   </script>
@endsection
