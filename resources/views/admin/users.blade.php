@extends('layout.dash')
@section('content')

<div class="container" style="margin-top: 50px; margin-left: 300px; padding-right: 200px;">
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
        </tr>
      </tbody>
  @endforeach
    </table>
</div>
@endsection