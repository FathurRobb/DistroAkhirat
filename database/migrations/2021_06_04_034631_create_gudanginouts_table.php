<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGudanginoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gudangins', function (Blueprint $table) {
            $table->id();
            //$table->string('type');
            $table->bigInteger('no_faktur');
            $table->bigInteger('no_order');
            //$table->bigInteger('nik_karyawan');
            $table->bigInteger('id_supplier');
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
        Schema::dropIfExists('gudangins');
    }
}
