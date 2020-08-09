@extends('layouts.main')

@section('title', 'About Laravel')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-10">
      <h1 class="mt-5">Hello, {{ $nama }}!</h1>
    </div>
  </div>
</div>
@endsection