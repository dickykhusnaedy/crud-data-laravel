@extends('layouts.main')

@section('title', 'List Lecture - Mahasiswa Kelas Laravel')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-10">
      <h1 class="mt-5 mb-4">List Dosen</h1>

      <a href="{{ url('/lecture/create') }}" class="btn btn-primary my-4">Tambah Data</a>

      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif

      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="row">#</th>
            <th>Nama Dosen</th>
            <th>Jurusan</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($dosen as $item)
            <tr>
            <td scope="row">{{ $loop->iteration }}</td>
              <td>{{ $item->nama_dosen }}</td>
              <td>{{ $item->jurusan->nama_jurusan }}</td>
              <td>
                <a href="{{ url('/lecture', $item->id) }}/edit" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ url('/lecture', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-sm btn-danger">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection