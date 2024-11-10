<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $primaryKey = 'id_berita';
    protected $fillable = [
        'id_berita',
        'judul',
        'subjudul',
        'gambar',
        'konten',
        'nama_author',
        'published_at'
    ];

    protected $casts = [
        'id_berita' => 'string',
    ];

    public $timestamps = false;

    public function kategoriberita(){
        return $this->hasMany(KategoriBerita::class, 'id_berita', 'id_berita');
    }
    public function user(){
        return $this->belongsTo(User::class, 'author_id', 'id_users');
    }
}
