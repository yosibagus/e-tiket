<?php

namespace Database\Seeders;

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
                'name' => 'Yayan',
                'username' => 'yayan',
                'password' => bcrypt('yayan123'),
                'role' => 'Petugas'
            ],
            [
                'name' => 'Yayan',
                'username' => 'yayan',
                'password' => bcrypt('yayan123'),
                'role' => 'Mitra'
            ],
        ];
    }
}
