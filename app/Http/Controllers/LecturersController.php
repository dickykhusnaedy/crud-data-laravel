<?php

namespace App\Http\Controllers;

use App\Jurusan;
use App\Lecture;
use Illuminate\Http\Request;

class LecturersController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $dosen = Lecture::all();
    return view('lecture.index', compact('dosen'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $jurusan = Jurusan::all();
    return view('lecture.create', compact('jurusan'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'nama_dosen' => 'required|min:5',
      'jurusan_id' => 'required',
    ], [
      'nama_dosen.required' => 'Nama Dosen harus diisi',
      'nama_dosen.min' => 'Nama Dosen harus memiliki minimal 5 karakter',
      'jurusan_id.required' => 'Jurusan harus diisi',
    ]);

    Lecture::create([
      'nama_dosen' => $request->nama_dosen,
      'jurusan_id' => $request->jurusan_id,
    ]);

    return redirect('/lecture')->with('status', 'Data berhasil ditambahkan!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Lecture  $lecture
   * @return \Illuminate\Http\Response
   */
  public function show(Lecture $lecture)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Lecture  $lecture
   * @return \Illuminate\Http\Response
   */
  public function edit(Lecture $lecture)
  {
    $jurusan = Jurusan::all();
    return view('lecture.edit', compact('lecture', 'jurusan'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Lecture  $lecture
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Lecture $lecture)
  {
    $request->validate([
      'nama_dosen' => 'required|min:5',
      'jurusan_id' => 'required',
    ], [
      'nama_dosen.required' => 'Nama Dosen harus diisi',
      'nama_dosen.min' => 'Nama Dosen harus memiliki minimal 5 karakter',
      'jurusan_id.required' => 'Jurusan harus diisi',
    ]);

    Lecture::where('id', $lecture->id)
      ->update([
        'nama_dosen' => $request->nama_dosen,
        'jurusan_id' => $request->jurusan_id,
      ]);

    return redirect('/lecture')->with('status', 'Data berhasil diupdate!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Lecture  $lecture
   * @return \Illuminate\Http\Response
   */
  public function destroy(Lecture $lecture)
  {
    Lecture::destroy($lecture->id);
    return redirect('/lecture')->with('status', 'Data berhasil dihapus!');
  }
}
