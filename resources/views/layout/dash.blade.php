<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet" type="text/css">
    <title>dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
  
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    <style>
      .list-group-item.active {
    background-color: #0385db;
    border-color: rgb(21, 181, 32);
}
    </style>
</head>     
{{-- @if(Auth::check()) --}}
<header>
  
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
          <a
          {{-- @if (Auth::user()->role == 'admin') --}}
            href="{{route('dashboard.admin')}}"
            class="list-group-item list-group-item-action py-2 ripple active"
            aria-current="true"
          >
            <i class="fas fa-book fa-fw me-3"></i><span>Dashboard</span>
          </a><br>
          {{-- @endifq
          @if (Auth::user()->role == 'user') --}}

          <a href="{{route('users')}}" class="list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-user fa-fw me-3"></i><span>Users</span>
          </a>
          <a href="{{route('category')}}" class="list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa- fa-fw me-3"></i><span>Category book</span>
          </a>
      {{-- @endif --}}
      <a href="{{route('logout')}}" class="list-group-item list-group-item-action py-2 ripple">
        <i class="fa-fw me-3"></i><span>Logout</span>
      </a>
        </div>
      </div>
    </nav>
    <!-- Sidebar -->
  
    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button
          class="navbar-toggler"
          type="button"
          data-mdb-toggle="collapse"
          data-mdb-target="#sidebarMenu"
          aria-controls="sidebarMenu"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars"></i>
        </button>
  
        <!-- Brand -->
        <a class="navbar-brand shadow" style=" border-radius: 30px; padding-left: 700px; padding-right: 870px;" href="#">
          <img class="center"
            src="{{asset('assets/img/wikrama.png')}}"
            height="50"
            {{-- style="margin-left:50px;" --}}
            alt=""
            loading="lazy" 
></a>
  </header>
  
  <main style="margin-top: 58px;">
    <div class="container pt-4"></div>
  </main>
  {{-- @endif --}}
    @yield('content')
</body>

</html>
