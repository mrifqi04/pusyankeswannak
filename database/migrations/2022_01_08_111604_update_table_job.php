<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableJob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->integer('minimum_tertulis')->nullable()->after('persyaratan_khusus');
            $table->integer('minimum_wawancara')->nullable()->after('minimum_tertulis');
            $table->integer('minimum_praktik')->nullable()->after('minimum_wawancara');
            $table->integer('kuota')->nullable()->after('minimum_praktik');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            //
        });
    }
}
