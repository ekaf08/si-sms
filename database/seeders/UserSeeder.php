<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('123456'),
            'user_type' => '1',
        ]);

        User::create([
            'name' => 'guru',
            'email' => 'guru@email.com',
            'password' => bcrypt('123456'),
            'user_type' => '2',
        ]);

        User::create([
            'name' => 'siswa',
            'email' => 'siswa@email.com',
            'password' => bcrypt('123456'),
            'user_type' => '3',
        ]);

        User::create([
            'name' => 'parent',
            'email' => 'parent@email.com',
            'password' => bcrypt('123456'),
            'user_type' => '4',
        ]);
    }
}
