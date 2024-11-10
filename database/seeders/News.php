<?php

namespace Database\Seeders;

use App\Models\News as ModelsNews;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class News extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsId = Str::uuid()->toString();
        DB::table('news')->insert([
            'id_berita' => $newsId,
            'judul' => 'Badai Hebat Menghantam Pantai Selatan, Banyak Rumah Rusak',
            'subjudul' => 'Peristiwa alam yang menyebabkan kerusakan parah di beberapa kota pesisir.',
            'konten' => 'Sebuah badai besar yang datang tiba-tiba menghantam pantai selatan Indonesia, menyebabkan kerusakan yang signifikan pada bangunan rumah di daerah tersebut. Badai ini membawa angin kencang disertai hujan lebat, membuat banyak warga harus mengungsi. Pemerintah setempat telah mengirimkan tim SAR untuk membantu evakuasi.',
            'gambar' => 'a.jpeg',
            'nama_author' => 'Muhammad Nayaka Putra',
            'published_at' => Carbon::now()->subDays(2),
        ]);

        // Menambahkan data ke kategori_berita
        DB::table('kategoriberita')->insert([
            'id_berita' => $newsId,
            'id_kategori' => 1 
        ]);
    }
}
