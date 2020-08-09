@extends('layouts.main')

@section('title', 'Update Data - Mahasiswa Kelas Laravel')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-8">
      <h1 class="mt-5 mb-4">Form Ubah Data</h1>
      <form method="post" action="{{ url('/students', $student->id) }}">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Input name" name="nama" value="{{ $student->nama }}" autocomplete="off">
          @error('nama')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="dosen_id">Dosen</label>
          <input type="text" class="form-control @error('dosen_id') is-invalid @enderror" id="dosen_id" placeholder="Input name" name="dosen_id" value="{{ $student->dosen->nama_dosen }}" readonly disabled>
          @error('dosen_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="jurusan_id">Jurusan</label>
          <select class="custom-select @error('jurusan_id') is-invalid @enderror" name="jurusan_id">
            @foreach ($jur as $item)
              <option value="{{ $item->id }}" {{ $student->jurusan->id == $item->id ? 'selected' : null }} >{{ $item->nama_jurusan }}</option>
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
          <input type="text" class="form-control @error('nrp') is-invalid @enderror" id="nrp" placeholder="Input nrp" name="nrp" value="{{ $student->nrp }}" autocomplete="off">
          @error('nrp')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Input email" name="email" value="{{ $student->email }}" autocomplete="off">
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <a href="{{ url('/students') }}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Ubah Data</button>
      </form>
    </div>
  </div>
</div>
@endsection