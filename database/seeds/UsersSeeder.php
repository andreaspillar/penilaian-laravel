<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          [
            'name' => 'adminHR',
            'email' => 'adminhr@kudus.puragroup.com',
            'password' => Hash::make('adminhr123'),
            'id_jabatan' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
          ],
          [
            'name' => 'managerHR',
            'email' => 'managerhr@kudus.puragroup.com',
            'password' => Hash::make('managerhr123'),
            'id_jabatan' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
          ],
          [
            'name' => 'kabidHR',
            'email' => 'kabidhr@kudus.puragroup.com',
            'password' => Hash::make('kabidhr123'),
            'id_jabatan' => 4,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
          ],
          [
            'name' => 'pimpinan569',
            'email' => 'pm569@kudus.puragroup.com',
            'password' => Hash::make('pimpinan569'),
            'id_jabatan' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
          ],
        ]);
    }
}
