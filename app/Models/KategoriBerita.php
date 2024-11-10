<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    use HasFactory;
    protected $table = 'kategoriberita';
    protected $fillable = [
        'id_berita',
        'id_kategori'
    ];
    public $timestamps = false;
    
    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
    public function berita(){
        return $this->belongsTo(News::class, 'id_berita', 'id_berita');
    }
}
