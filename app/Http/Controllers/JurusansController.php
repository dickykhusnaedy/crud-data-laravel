<?php

namespace App\Http\Controllers;

use App\Jurusan;
use Illuminate\Http\Request;

class JurusansController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $jurusans['jurusan'] = Jurusan::all();
    return view('jurusan.index', $jurusans);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('jurusan.create');
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
      'nama_jurusan' => 'required',
    ], [
      'nama_jurusan.required' => 'Jurusan harus diisi',
    ]);

    Jurusan::create($request->all());
    return redirect('/jurusan')->with('status', 'Data berhasil ditambahkan!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Jurusan  $jurusan
   * @return \Illuminate\Http\Response
   */
  public function show(Jurusan $jurusan)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Jurusan  $jurusan
   * @return \Illuminate\Http\Response
   */
  public function edit(Jurusan $jurusan)
  {
    return view('jurusan.edit', compact('jurusan'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Jurusan  $jurusan
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Jurusan $jurusan)
  {
    $request->validate([
      'nama_jurusan' => 'required',
    ], [
      'nama_jurusan.required' => 'Jurusan harus diisi',
    ]);
    Jurusan::where('id', $jurusan->id)
      ->update([
        'nama_jurusan' => $request->nama_jurusan
      ]);

    return redirect('/jurusan')->with('status', 'Data berhasil diupdate!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Jurusan  $jurusan
   * @return \Illuminate\Http\Response
   */
  public function destroy(Jurusan $jurusan)
  {
    Jurusan::destroy($jurusan->id);
    return redirect('/jurusan')->with('status', 'Data berhasil dihapus!');
  }
}
