<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'id_users';
    protected $fillable = [
        'id_users',
        'nama',
        'role',
        'email',
        'password',
    ];
    public function berita(){
        return $this->hasOne(News::class, 'author_id', 'id_users');
    }


}
