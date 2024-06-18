<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penginapan', function (Blueprint $table) {
            $table->id('id_penginapan');
            $table->string('nama_penginapan');
            $table->text('deskripsi_penginapan');
            $table->string('alamat_penginapan');
            $table->string('gambar_penginapan');
            $table->integer('harga_penginapan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penginapan');
    }
};
