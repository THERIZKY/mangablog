<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MangaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'mangaTitle'    => 'Love Live! - School Idol Days',
                'slug'          => 'love-live-school-idol-days',
                'cover'         => 'https://i.postimg.cc/YSPNRc0W/001.jpg',
            ],
            [
                'mangaTitle'    => 'Love Live! Sunshine!! - School Idol Days',
                'slug'          => 'love-live-sunshine-school-idol-days',
                'cover'         => 'https://i.postimg.cc/fbzWr1G8/001.jpg',
            ]
        ];
        // Using Query Builder
        $this->db->table('manga')->insertBatch($data);

        $data = [
            [
                'email' => 'rizhrizh24@gmail.com',
                'username' => 'Rizhora',
                'password_hash' => '$2y$10$nfjGD1sx.w5v5BBHI3Yjk.X07LwkMaPjebB.Nd7DlgKKCchU8zXCO',
            ]
        ];
        $this->db->table('users')->insertBatch($data);
    }
}
