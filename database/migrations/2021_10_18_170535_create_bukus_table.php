<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->bigIncrements('idbuku');
            $table->char('isbn', 13);
            $table->string('judul');
            $table->unsignedBigInteger('idkategori');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->string('kota_penerbit');
            $table->string('editor');
            $table->binary('file_gambar');
            $table->timestamps();
            $table->integer('stok');
            $table->integer('stok_tersedia');
        });

        Schema::table('bukus', function (Blueprint $table) {
            $table->foreign('idkategori')->references('idkategori')->on('kategoris')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukus');
    }
}
