<?php

use Illuminate\Database\Seeder;

class Departemen extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departemens')->insert([
          [
            'departemen'=>'HR-GA',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
          ],
          [
            'departemen'=>'Alat Berat',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
          ],
          [
            'departemen'=>'Laboratorium',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
          ],
          [
            'departemen'=>'Keuangan',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
          ],
          [
            'departemen'=>'PPIC',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
          ],
          [
            'departemen'=>'Unit Limbah',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
          ],

        ]);
    }
}
