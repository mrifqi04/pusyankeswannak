<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLamaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lamarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('job_id')->nullable();
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->string('no_kk');            
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->string('no_hp');
            $table->string('pendidikan');
            $table->string('npwp');
            $table->date('tanggal_skck');
            $table->string('bank');
            $table->string('rekening');
            $table->string('surat_sehat');                        
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
        Schema::dropIfExists('lamarans');
    }
}
