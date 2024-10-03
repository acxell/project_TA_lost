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
        Schema::create('pesan_perbaikans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('kegiatan_id')->nullable();
            $table->uuid('lpj_id')->nullable();
            $table->string('pesan');
            $table->uuid('user_id');
            $table->uuid('unit_id');
            $table->timestamps();

            $table->foreign('kegiatan_id')->references('id')->on('kegiatans')->onDelete('cascade');
            $table->foreign('lpj_id')->references('id')->on('lpjs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('penggunas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesan_perbaikans');
    }
};
