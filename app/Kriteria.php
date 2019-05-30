<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $primaryKey = 'id_kriteria';
    protected $fillable = [
      'nama_kriteria', 'nilai_kriteria'
    ];
}
