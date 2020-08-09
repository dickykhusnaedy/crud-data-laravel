@extends('layouts.main')

@section('title', 'Ubah Data - Mahasiswa Kelas Laravel')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-8">
      <h1 class="mt-5 mb-4">Form Ubah Data Dosen</h1>

      <form method="post" action="{{ url('/lecture', $lecture->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="nama_dosen">Nama Dosen</label>
          <input type="text" class="form-control @error('nama_dosen') is-invalid @enderror" id="nama_dosen" placeholder="Input jurusan" name="nama_dosen" value="{{ $lecture->nama_dosen }}" autocomplete="off">
          @error('nama_dosen')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="jurusan_id">Jurusan</label>
          <select class="custom-select @error('jurusan_id') is-invalid @enderror" name="jurusan_id">
            @foreach ($jurusan as $item)
              <option value="{{ $item->id }}" {{ $lecture->jurusan->id == $item->id ? 'selected' : null }} >{{ $item->nama_jurusan }}</option>
            @endforeach
          </select>
          @error('jurusan_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <a href="{{ url('/lecture') }}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
      </form>
    </div>
  </div>
</div>
@endsection