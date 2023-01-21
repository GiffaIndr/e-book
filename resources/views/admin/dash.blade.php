@extends('layout.dash')
@section('content')
<form action="{{route('store')}}" method="POST" enctype="multipart/form-data">


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
          <select name="genre" placeholder="Category" id="genre">
            @foreach ($category as $item)
                
            
            <option hidden></option>
            <option value="{{$item->genre}}">{{$item->genre}}</option>
            @endforeach
          </select>
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
<div class="card shadow" style="margin-left: 200px; margin-top: 20px" >
  </form>

  <div class="container" style="margin-top: 50px; margin-left: 90px; padding-right: 200px;">
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
        <td><a href="{{route('detail', $commer->id)}}">Lihat</a></td>
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