@extends('layouts.main')

@section('title', 'List Students - Mahasiswa Kelas Laravel')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-4">
      <h1 class="mt-5 mb-4">List Students</h1>

      <a href="{{ url('/students/create') }}" class="btn btn-primary my-4">Tambah Data</a>

      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif

      @foreach ($student as $mhs)
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $mhs->nama }}
            <a href="/students/{{ $mhs->id }}" class="btn btn-sm btn-primary">Detail</a>
          </li>
        </ul>
      @endforeach
    </div>
  </div>
</div>
@endsection