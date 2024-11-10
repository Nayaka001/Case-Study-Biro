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
        Schema::create('news', function (Blueprint $table) {
            $table->uuid('id_berita')->unique()->primary();
            $table->string('judul', 255);
            $table->string('subjudul', 255);
            $table->text('konten');
            $table->string('gambar', 255);
            $table->string('nama_author', 255);
            $table->timestamp('published_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
