<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lamaran_id')->nullable();
            $table->foreign('lamaran_id')->references('id')->on('lamarans');
            $table->string('file_ktp');
            $table->string('file_kk');
            $table->string('file_foto');
            $table->string('file_nilai_ijazah');
            $table->string('file_npwp');
            $table->string('file_skck');
            $table->string('file_sim')->nullable();
            $table->string('file_surat_sehat');
            $table->string('file_sertifikat');
            $table->string('file_lamaran');
            $table->string('file_cv');
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
        Schema::dropIfExists('files');
    }
}
