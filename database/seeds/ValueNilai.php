<?php

use Illuminate\Database\Seeder;

class ValueNilai extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('value_nilais')->insert([
          [
            'nilai_value' => 20.0,
            'alias_value' => 'Sangat Kurang',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
          ],
          [
            'nilai_value' => 40.0,
            'alias_value' => 'Kurang',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
          ],
          [
            'nilai_value' => 60.0,
            'alias_value' => 'Cukup',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
          ],
          [
            'nilai_value' => 80.0,
            'alias_value' => 'Baik',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
          ],
          [
            'nilai_value' => 100.0,
            'alias_value' => 'Sangat Baik',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
          ],
        ]);
    }
}
