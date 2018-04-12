
@extends('layouts.lte')
@section('css')
  <style>

    .container{
      background: white;
      border-radius: 4px;
    }
  </style>
@endsection
@section('header')
User
@endsection
@section('content')
<div class="container p-4">
  <h1 class="text-center">U S E R</h1>
    <a class="btn btn-md btn-success" href="/admin/users/create" >Tambah User</a><br><br>
  <table class="table">
    @php
      $no=1;
    @endphp
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Opsi</th>
    </tr>
    @foreach ($user as $users)
    <tr>
      <td>{{$no++}}</td>
      <td>{{$users->name}}</td>
      <td>{{$users->email}}</td>
      <td>
        <a href="/admin/users/{{$users->id}}/edit" type="button" class="btn btn-sm btn-primary" name="button"> <i class="fa fa-pencil"></i>   Edit</a>
        <form class="" action="users/{{$users->id}}" method="post">
          {{ csrf_field() }}
           {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-danger" name="button" onclick="confirm('Yain ingin menghapus ?')"> <i class="fa fa-trash"></i> Hapus</button>
        </form>

      </td>
    </tr>
  @endforeach

  </table>
</div>
@endsection
