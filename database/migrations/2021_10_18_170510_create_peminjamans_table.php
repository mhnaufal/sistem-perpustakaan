<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->bigIncrements('idtransaksi');
            $table->char('nim', 14);
            $table->timestamp('tgl_pinjam')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('total_denda');
            $table->unsignedBigInteger('idpetugas');
            $table->foreign('nim')->references('nim')->on('anggotas')->onDelete('CASCADE');
            $table->foreign('idpetugas')->references('idpetugas')->on('petugas')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjamans');
    }
}
