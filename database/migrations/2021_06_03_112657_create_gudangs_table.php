<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGudangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gudangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_brg')->unique();
            $table->string('nm_brg');
            $table->string('warna');
            $table->string('jenis');
            $table->string('ukuran');
            $table->bigInteger('stok_brg');
            $table->bigInteger('hrg_beli');
            $table->bigInteger('hrg_jual');
            //$table->string('satuan_brg');
            $table->text('detail');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gudangs');
    }
}
