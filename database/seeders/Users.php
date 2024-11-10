<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class Users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id_users' => (string) Str::uuid(), 
                'nama' => 'Muhammad Nayaka Putra',
                'role' => 'Super Admin',
                'email' => 'nayakaputra773@gmail.com',
                'password' => bcrypt('naya1810'),
            ],
            [
                'id_users' => (string) Str::uuid(), 
                'nama' => 'Naufal Azmi',
                'role' => 'Admin',
                'email' => 'naufal@gmail.com',
                'password' => bcrypt('naufal123'),
            ],
        ]);
    }
}
