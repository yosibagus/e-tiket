<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Yosi',
                'username' => 'yosi',
                'password' => bcrypt('yosi123'),
                'role' => 'Admin'
            ],
            [
                'name' => 'Yayan',
                'username' => 'yayan',
                'password' => bcrypt('yayan123'),
                'role' => 'Petugas'
            ],
            [
                'name' => 'Perihal Cafe',
                'username' => 'perihal',
                'password' => bcrypt('perihal123'),
                'role' => 'Mitra'
            ],
        ];

        User::insert($data);
    }
}
