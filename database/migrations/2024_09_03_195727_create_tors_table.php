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
        Schema::create('tors', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_proker')->unique();
            $table->string('satuan_kerja');
            $table->string('status');
            $table->string('pic');
            $table->uuid('unit_id');
            $table->timestamps();

            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tors');
    }
};
