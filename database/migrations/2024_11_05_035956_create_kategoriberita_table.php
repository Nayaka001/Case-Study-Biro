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
        Schema::create('kategoriberita', function (Blueprint $table) {
            $table->foreignUuid('id_berita')->nullable()->references('id_berita')->on('news')->onDelete('set null');
            $table->foreignId('id_kategori')->nullable()->references('id_kategori')->on('category')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoriberita');
    }
};
