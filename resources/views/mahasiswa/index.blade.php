@extends('layouts.main')

@section('title', 'Mahasiswa Kelas Laravel')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-10">
      <h1 class="mt-5 mb-4">Daftar Mahasiswa</h1>
      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">NRP</th>
            <th scope="col">Email</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($mhs as $mhs)
            <tr>
              <td scope="row">{{$loop->iteration}}</td>
              <td>{{$mhs->nama}}</td>
              <td>{{$mhs->nrp}}</td>
              <td>{{$mhs->email}}</td>
              <td>{{$mhs->jurusan}}</td>
              <td>
                <a href="" class="badge badge-success">Add</a>
                <a href="" class="badge badge-danger">Delete</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection