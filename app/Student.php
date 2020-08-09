<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $fillable = ['dosen_id', 'jurusan_id', 'nama', 'nrp', 'email'];

    public function jurusan()
    {
        return $this->belongsTo('App\Jurusan');
    }

    public function dosen()
    {
        return $this->belongsTo('App\Lecture');
    }
}
