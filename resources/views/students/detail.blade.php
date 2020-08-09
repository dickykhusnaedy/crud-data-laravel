@extends('layouts.main')

@section('title', 'Detail - Mahasiswa Kelas Laravel')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-4">
      <h1 class="mt-5 mb-4">Detail Students</h1>
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-7">
                <h5 class="font-weight-bold m-0">
                  {{ $student->nama }}
                </h5>
                <small class="m-0">{{ $student->nrp }}</small>
              </div>
              <div class="col d-flex align-self-center justify-content-end">
                <a href="{{ $student->id }}/edit" class="btn btn-sm btn-primary mr-1">Edit</a>
                <form action="{{ $student->id }}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
              </div>
            </div>
          </div>
          <div class="card-body">
            <label class="font-weight-bold">Dosen Wali</label>
            <p>{{ $student->dosen->nama_dosen ? $student->dosen->nama_dosen : '[not set]' }}</p>
            <label class="font-weight-bold">Jurusan</label>
            <p>{{ $student->jurusan->nama_jurusan ? $student->jurusan->nama_jurusan : '[not set]' }}</p>
            <label class="font-weight-bold">Email</label>
            <p>{{ $student->email ? $student->email : '[not set]' }}</p>
          </div>
          <div class="card-footer">
          <a class="btn btn-secondary btn-sm" href="{{ url('/students') }}" role="button">Back</a>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection