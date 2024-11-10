<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::insert([
            'nama_kategori' => 'TPB 01 Tanpa Kemiskinan',
        ]);
        Kategori::insert([
            'nama_kategori' => 'TPB 02 Tanpa Kelaparan',
        ]);
        Kategori::insert([
            'nama_kategori' => 'TPB 03 Kehidupan Sehat dan Sejahtera',
        ]);
    }
}
