@extends('layout.dash')
@section('content')
<form action="{{route('store')}}" method="POST" enctype="multipart/form-data">


    @csrf
    <div class="container">
        <div class="card shadow" style="
            padding-left: 150px; 
            padding-right: 150px;
            padding-top: 50px;
            padding-bottom: 50px;

              margin-left:200px;
               margin-left:200px;
               " >
               <h1>Input Buku</h1>
               @if($errors->any())
  <span class="text-danger">
    <ul>
      @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
      @endforeach
    </ul>
  </span>
  @endif
  @if(Session::get('berhasilTambah'))
  <div class="alert alert-success">
  {{Session::get('berhasilTambah')}}</div>
  @endif
               <hr>
    <div class="form-row" style="padding-top: 20px;">
        <div class="row">
      <div class="col">
        <input type="text" class="form-control" name="buku" placeholder="Buku">
      </div>
      <div class="col">
        <input type="text" class="form-control" name="penulis" placeholder="penulis">
      </div>
      <div class="form-row" style="padding-top: 20px;">
        <div class="row">
        <div class="col">
            <input type="text" class="form-control" name="penerbit" placeholder="penerbit">
          </div>
          <div class="col"style="">
            <input type="file" class="form-control" name="image" placeholder="image">
          </div>
        <div class="col" style="">
          <input type="text" class="form-control" name="genre" placeholder="genre">
        </div>
    </div>
      <div class="form-group " style="">
        <div class="col" style="padding-top: 10px ">
        <textarea class="form-control" name="sinopsis" style="padding-bottom: 100px" id="exampleFormControlTextarea1" placeholder="sinopsis "></textarea>
        <textarea class="form-control" name="isi" style="padding-bottom: 200px; margin-top: 20px;" id="exampleFormControlTextarea1" placeholder="Bacaan "></textarea>
        </div>
      </div>
      </div>
      <br>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div></div>
</div>
  </form>
  <div class="container" style="margin-top: 50px; margin-left: 200px; padding-right: 200px;">
  <table class="table" style="">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Book ID</th>
        <th scope="col">Category ID</th>
        <th scope="col">Title</th>
        <th scope="col">Writer</th>
        <th scope="col">publisher</th>
        <th scope="col">synopsis</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    @foreach ($commers as $commer)
    <tbody>
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$commer->id}}</td>
        <td>{{$commer->genre}}</td>
        <td>{{$commer->buku}}</td>
        <td>{{$commer->penulis}}</td>
        <td>{{$commer->penerbit}}</td>
        <td>{{$commer->sinopsis}}</td>
      </tr>
    </tbody>
@endforeach

  </table>
  </div>
@endsection