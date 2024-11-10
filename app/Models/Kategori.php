<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $primaryKey = 'id_kategori';
    protected $fillable = [
        'id_kategori',
        'nama_kategori'
    ];

    protected $casts = [
        'nama_kategori' => 'string '
    ];
    public $timestamps = false;

    public function kategoriberita(){
        return $this->hasMany(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
