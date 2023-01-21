@extends('layout.dash')
@section('content')
<div class="card shadow" style="margin-left: 200px; margin-top: 20px" >
<div class="container" style="margin-top: 50px; margin-left: 140px; padding-right: 200px;">
    <h1> Data Users</h1>
<hr>

    <table class="table" style="">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">User ID</th>
          <th scope="col">Nama</th>
          <th scope="col">No Handphone</th>
          <th scope="col">Email</th>
          <th scope="col">action</th>
        </tr>
      </thead>
      @foreach ($users as $user)
      <tbody>
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{$user->id}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->no}}</td>
          <td>{{$user->email}}</td>
          <td> <form  action="{{route('delete', $user->id)}}" method="post">
            @method('DELETE')
            @csrf
            <br>
            <button type="submit" class="fas fa-trash" style="border: 20px solid rgba(255, 255, 255, 0.573); border-radius:20%; font-size:15px;"></button>
          </form></td>
        </tr>
      </tbody>
      <a type="button" href="{{route('export')}}"  class="btn btn-success" style="color: white; margin-right:20px;">Import Excel</a>
      <a type="button" href="{{route('pdf.user')}}"  class="btn btn-danger" style="color: white">Import pdf</a>
  @endforeach
    </table>
</div>
</div>  
@endsection