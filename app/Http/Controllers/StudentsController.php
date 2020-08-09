<?php

namespace App\Http\Controllers;

use App\Jurusan;
use App\Lecture;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $students['student'] = Student::all();
    return view('students.index', $students);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $jurusan = Jurusan::all();
    $dosen = Lecture::all();
    return view('students.create', compact('jurusan', 'dosen'));
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
      'nama' => 'required|min:5',
      'nrp' => 'required|size:10|unique:students',
      'jurusan_id' => 'required',
      'dosen_id' => 'required',
    ], [
      'nama.min' => 'Minimal 5 karakter',
      'nama.required' => 'Nama harus diisi',
      'nrp.size' => 'Harus diisi dengan 10 karakter',
      'nrp.unique' => 'NRP ini sudah sudah ada',
      'nrp.required' => 'NRP harus diisi',
      'jurusan_id.required' => 'Jurusan harus diisi',
    ]);

    // return $request->all();
    // exit;

    // Student::create($request->all());

    Student::create([
      'nama' => $request->nama,
      'dosen_id' => $request->dosen_id,
      'jurusan_id' => $request->jurusan_id,
      'nrp' => $request->nrp,
      'email' => $request->email,
    ]);

    return redirect('/students')->with('status', 'Data berhasil ditambahkan!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Student  $student
   * @return \Illuminate\Http\Response
   */
  public function show(Student $student)
  {
    return view('students.detail', compact('student'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Student  $student
   * @return \Illuminate\Http\Response
   */
  public function edit(Student $student)
  {
    $jur = Jurusan::all();
    return view('students/edit', compact('student', 'jur'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Student  $student
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Student $student)
  {
    $request->validate([
      'nama' => 'required',
      'nrp' => 'required|size:10',
    ]);

    Student::where('id', $student->id)
      ->update([
        'nama' => $request->nama,
        'jurusan_id' => $request->jurusan_id,
        'nrp' => $request->nrp,
        'email' => $request->email,
      ]);
    return redirect('/students')->with('status', 'Data berhasil diupdate!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Student  $student
   * @return \Illuminate\Http\Response
   */
  public function destroy(Student $student)
  {
    Student::destroy($student->id);
    return redirect('/students')->with('status', 'Data berhasil dihapus!');
  }
}
