<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValueNilai extends Model
{
    protected $table = 'value_nilais';
    protected $fillable = ['id_value', 'nilai_value', 'alias_value'];
}
