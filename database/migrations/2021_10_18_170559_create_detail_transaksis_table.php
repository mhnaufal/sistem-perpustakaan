<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
    */
    public function up()
    {
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->bigIncrements('idtransaksi');
            $table->unsignedBigInteger('idbuku');
            $table->timestamp('tgl_kembali')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('denda');
            $table->timestamps();
            $table->foreign('idbuku')->references('idbuku')->on('bukus')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transaksis');
    }
}
