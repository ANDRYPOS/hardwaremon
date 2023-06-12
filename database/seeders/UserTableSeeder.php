<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Andri Elistiawan',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'avatar' => '1685624709.jpg',
            'phone' => '085881301274',
            'address' => 'Parung bogor Jawa-Barat',
            'password' => '123456'
        ]);
        User::create([
            'name' => 'Andri Elistiawan',
            'email' => 'staff@gmail.com',
            'role' => 'staff',
            'avatar' => '1685624709.jpg',
            'phone' => '085881301274',
            'address' => 'Parung bogor Jawa-Barat',
            'password' => '123456'
        ]);
        User::create([
            'name' => 'Andri Elistiawan',
            'email' => 'user@gmail.com',
            'role' => 'user',
            'avatar' => '1685624709.jpg',
            'phone' => '085881301274',
            'address' => 'Parung bogor Jawa-Barat',
            'password' => '123456'
        ]);
    }
}
