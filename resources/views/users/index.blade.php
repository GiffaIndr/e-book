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

</div>
</section>
<br>
<h1 class="heading"> Most <span>Favorite</span></h1>
<section class="banner-container" id="favorite">
<div class="container2"> 
    <div class="testimonial mySwiper">
        <div class="testi-content swiper-wrapper">
            @foreach($others as $other)
          <div class="slide swiper-slide">
            <div class="banner" style="padding-left: 12px;  ">
                <img style="" src="{{asset('assets/img/'. $other->image)}}" alt="">
                <div class="content">
                    <h3 style="color: white">TOP#<b style="font-size:50px">{{$loop->iteration}}</b></h3>
                    <span style="color: rgb(7, 234, 255)">{{$other->genre}}</span>
                    <h3 style="color: rgb(255, 255, 255)">{{$other->buku}}</h3>
                    <a href="#" class="btns">Baca Sekarang</a>
                </div>
            </div>
          
        </div>
        
        @endforeach
    </div>
    
</section>
<section class="product" id="book">
    <h1 class="heading"> All <span>Books</span></h1>
    <div class="btn-group" style="margin-left:93%;">
        <button type="button" class="btn" style="background-color: #04d9c7; color:white;">Category</button>
        <button type="button" style="background-color: #04d9c7; color:white;" class="btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
          <span class="visually-hidden">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Novel</a></li>
          <li><a class="dropdown-item" href="#">IT</a></li>
          <li><a class="dropdown-item" href="#">Fiksi</a></li>
          <li><a class="dropdown-item" href="#">Sains</a></li>
          <li><a class="dropdown-item" href="#">Biografi</a></li>
          <li><a class="dropdown-item" href="#">Majalah</a></li>
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
                 <form  action="{{route('delete', $commer->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <br>
                    <button type="submit" class="fas fa-trash" style="border: 20px solid rgba(255, 0, 0, 0.573); border-radius:20%; font-size:15px;"></button>
                  </form>
                  <br>
                <a href="{{route('screen', $commer->id)}}" class="fas fa-eye"></a>
            </div>
        </div>
        @endforeach
    </div>
    <br>
    <a href="#" class="btns">read more</a>
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
