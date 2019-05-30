<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class BuatTabelJabatan extends Migration
{
    public function up()
    {
        Schema::create('jabatan', function (Blueprint $table){
            $table->increments('id_jabatan',2);
            $table->string('role');
            $table->timestamps();
        });
    }

    public function down()
    {
        //
    }
}
