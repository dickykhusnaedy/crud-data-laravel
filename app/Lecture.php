<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
  // Connect table wtih the not same name table in database
  protected $table = 'lecturers';

  // Mass Assigment
  protected $fillable = ['nama_dosen', 'jurusan_id'];

  public function jurusan()
  {
    return $this->belongsTo('App\Jurusan');
  }
}
