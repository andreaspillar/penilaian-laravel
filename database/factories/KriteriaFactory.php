<?php

use App\Kriteria;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Kriteria::class, function (Faker $faker) {
  return [
      'nama_kriteria' => $faker->sentence(2,true),
      'nilai_kriteria' => $faker->numberBetween(0,10),
  ];
});
