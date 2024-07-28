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
        Schema::create('artikels', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('image');
            $table->unsignedBigInteger('id_categories');
            $table->dateTime('tanggal_dibuat')->useCurrent();
            $table->dateTime('tanggal_diperbarui')->useCurrent()->useCurrentOnUpdate();
            $table->foreign('id_categories')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikels');
    }
};
