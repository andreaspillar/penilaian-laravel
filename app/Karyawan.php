<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $primaryKey = 'id_karyawan';
    protected $fillable = [
        'nomor_karyawan', 'nama_karyawan', 'id_departemen', 'id_jabatan', 'nilai',
    ];

}
