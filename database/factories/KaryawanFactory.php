<?php

use Faker\Generator as Faker;

$factory->define(App\Karyawan::class, function (Faker $faker) {
    return [
        'nomor_karyawan' => $faker->numberBetween(1000, 6000),
        'nama_karyawan' => $faker->name(),
        'nilai' => '0',
        'departemen' => 'Produksi PM 5',
        'role' => 'Manager',
    ];
});
