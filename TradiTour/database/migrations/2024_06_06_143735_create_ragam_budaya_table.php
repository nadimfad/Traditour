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
        Schema::create('ragam_budaya', function (Blueprint $table) {
            $table->id('id_ragambudaya');
            $table->string('nama_budaya');
            $table->foreignId('id_bahari')->constrained('bahari',"id_bahari");
            $table->foreignId('id_non_bahari')->constrained('non_bahari',"id_non_bahari");
            $table->foreignId('id_seni_budaya')->constrained('seni_budaya',"id_seni_budaya");
            $table->foreignId('id_kuliner')->constrained('kuliner',"id_kuliner");
            $table->foreignId('id_kerajinan_kreatif')->constrained('kerajinan_kreatif',"id_kerajinan_kreatif");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ragam_budaya');
    }
};
