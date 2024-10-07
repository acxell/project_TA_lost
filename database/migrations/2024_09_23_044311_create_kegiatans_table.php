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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('proker_id');
            $table->string('nama_kegiatan')->unique();
            $table->bigInteger('total_biaya');
            $table->string('biaya_terbilang');
            $table->string('status');
            $table->uuid('user_id');
            $table->uuid('unit_id');
            $table->uuid('coa_id');
            $table->timestamps();

            $table->foreign('proker_id')->references('id')->on('program_kerjas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('penggunas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
