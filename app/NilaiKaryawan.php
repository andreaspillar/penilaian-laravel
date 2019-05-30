<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiKaryawan extends Model
{
    protected $table = 'nilai_karyawans';
    protected $fillable = ['id_karyawan', 'nilai_karyawan', 'id_kriteria'];

}
