@extends('layout.layout')
@section('content')
@if(Auth::check())
@foreach($commers as $commer)
@endforeach

<h1>{{ ucfirst(auth()->user()->role) }}</h1>
  <div class="small-container single-product">
    <div class="row">
        <div class="col-2">
        <img src="{{asset('assets/img/'.$commer->image)}}" width="100%" 
        id="ProductImg">

    </div>
    <div class="col-2">
        <p>Buku {{$commer->jenis}}</p>
        <h5> </h5>
        <h4>{{$commer->buku}}</h4>
        <h5>Genre : {{$commer->genre}}</h5>
        <h5> {{$commer->penulis}}</h5>

<h3>Sinopsis<i class="fa fa-indent"></i></h3>
    <br>
    <p>{{$commer->sinopsis}}</p>
    <a href="{{route('pdf.input', $commer->id)}}" class="btns">Download PDF</a>
</div>
</div>
</div>
</body>
@endif
<script>

</script>
@endsection