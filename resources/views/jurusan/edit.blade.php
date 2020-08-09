@extends('layouts.main')

@section('title', 'Update Data - Mahasiswa Kelas Laravel')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-8">
      <h1 class="mt-5 mb-4">Form Ubah Jurusan</h1>

      <form method="post" action="{{ url('/jurusan', $jurusan->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="nama_jurusan">Nama Jurusan</label>
          <input type="text" class="form-control @error('nama_jurusan') is-invalid @enderror" id="nama_jurusan" placeholder="Input jurusan" value="{{ $jurusan->nama_jurusan }}" name="nama_jurusan" autocomplete="off">
          @error('nama_jurusan')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <a href="{{ url('/jurusan') }}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Ubah Data</button>
      </form>
    </div>
  </div>
</div>
@endsection