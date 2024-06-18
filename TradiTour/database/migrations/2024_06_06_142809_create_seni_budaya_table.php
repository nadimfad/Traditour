<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('seni_budaya', function (Blueprint $table) {
            $table->id('id_seni_budaya');
            $table->string('judul');
            $table->string('gambar');
            $table->text('artikel');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seni_budaya');
    }
};
