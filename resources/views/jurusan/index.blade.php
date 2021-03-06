@extends('layouts.main')

@section('title', 'Jurusan - Mahasiswa Kelas Laravel')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-6">
      <h1 class="mt-5 mb-4">List Jurusan</h1>

      <a href="{{ url('/jurusan/create') }}" class="btn btn-primary my-4">Tambah Data</a>

      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif

      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="row">#</th>
            <th>Nama Jurusan</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($jurusan as $jur)
            <tr>
            <td scope="row">{{ $loop->iteration }}</td>
              <td>{{ $jur->nama_jurusan }}</td>
              <td>
                <a href="{{ url('/jurusan', $jur->id) }}/edit" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ url('/jurusan', $jur->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
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