@extends('layout.dash')
@section('content')

<form action="{{route('genre')}}" method="POST" enctype="multipart/form-data">


    @csrf
    <style>
      *{

      }
    </style>
    <div class="card" style="background-color: grey;">
    <div class="container">
        <div class="card shadow" style="
            padding-left: 150px; 
            padding-right: 150px;
            padding-top: 50px;
            padding-bottom: 50px;

              margin-left:200px;
               margin-left:200px;
               " >
               <h1>Input Kategori</h1>
               @if($errors->any())
  <span class="text-danger">
    <ul>
      @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
      @endforeach
    </ul>
  </span>
  @endif
  @if (session('hapus'))
    <div class="alert alert-danger">
        {{ session('hapus') }}
    </div>
    @endif
  @if(Session::get('suksesTambah'))
  <div class="alert alert-success">
  {{Session::get('suksesTambah')}}</div>
  @endif
               <hr>
    <div class="form-row" style="padding-top: 20px;">
        <div class="row">
      <div class="col">
        <input type="text" class="form-control" name="genre" placeholder="Category">
      </div>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button></div>
</div>
<div class="card shadow" style="margin-left: 200px; margin-top: 20px" >
  </form>

  <div class="container" style="margin-top: 50px; margin-left: 90px; padding-right: 200px;">
  <table class="table" style="">
    <thead style="background-color: rgb(8, 172, 218); color:white;">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Category ID</th>
        <th scope="col">Category</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    @foreach ($commers as $commer)
    <tbody>
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$commer->id}}</td>
        <td>{{$commer->genre}}</td>
        <td> <form  action="{{route('delete', $commer->id)}}" method="post">
          @method('DELETE')
          @csrf
          <br>
          <button type="submit" class="fas fa-trash" style="border: 20px solid rgba(255, 255, 255, 0.573); border-radius:20%; font-size:15px;"></button>
        </form></td>
      </tr>
    </tbody>
@endforeach

  </table>
  </div>
  </div>
  </div>

@endsection