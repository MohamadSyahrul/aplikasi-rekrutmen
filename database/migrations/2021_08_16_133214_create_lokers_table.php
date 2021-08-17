<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLokersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('detail');
            $table->string('tingkat_pendidikan');
            $table->string('jenis_kelamin');
            $table->string('umur');
            $table->string('status_kerja');
            $table->integer('gaji');
            $table->date('batas_lamaran');
            $table->text('deskripsi');
            $table->string('persyaratan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lokers');
    }
}
