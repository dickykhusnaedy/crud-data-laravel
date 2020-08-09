@extends('layouts.main')

@section('title', 'Tambah Data - Mahasiswa Kelas Laravel')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-8">
      <h1 class="mt-5 mb-4">Form Tambah Jurusan</h1>

      <form method="post" action="{{ url('/jurusan') }}">
        @csrf
        <div class="form-group">
          <label for="nama_jurusan">Nama Jurusan</label>
          <input type="text" class="form-control @error('nama_jurusan') is-invalid @enderror" id="nama_jurusan" placeholder="Input jurusan" name="nama_jurusan" value="{{ old('nama_jurusan') }}" autocomplete="off">
          @error('nama_jurusan')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <a href="{{ url('/jurusan') }}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
      </form>
    </div>
  </div>
</div>
@endsection