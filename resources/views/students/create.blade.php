@extends('layouts.main')

@section('title', 'Tambah Data - Mahasiswa Kelas Laravel')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-8">
      <h1 class="mt-5 mb-4">Form Tambah Students</h1>
      <form method="post" action="{{ url('/students') }}">
        @csrf
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Input name" name="nama" value="{{ old('nama') }}" autocomplete="off">
          @error('nama')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="dosen_id">Dosen</label>
          <select class="custom-select @error('dosen_id') is-invalid @enderror" name="dosen_id">
            <option selected disabled value="">Pilih Dosen</option>
              @foreach ($dosen as $item)
                <option value="{{ $item->id }}" {{ old('dosen_id') == $item->id ? 'selected' : null }}>{{ $item->nama_dosen }}</option>
              @endforeach
          </select>
          @error('dosen_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="jurusan_id">Jurusan</label>
          <select class="custom-select @error('jurusan_id') is-invalid @enderror" name="jurusan_id">
            <option selected disabled value="">Pilih Jurusan</option>
              @foreach ($jurusan as $item)
                <option value="{{ $item->id }}" {{ old('jurusan_id') == $item->id ? 'selected' : null }}>{{ $item->nama_jurusan }}</option>
              @endforeach
          </select>
          @error('jurusan_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="nrp">NRP</label>
          <input type="text" class="form-control @error('nrp') is-invalid @enderror" id="nrp" placeholder="Input nrp" name="nrp" value="{{ old('nrp') }}" autocomplete="off">
          @error('nrp')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Input email" name="email" value="{{ old('email') }}" autocomplete="off">
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <a href="{{ url('/students') }}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
      </form>
    </div>
  </div>
</div>
@endsection