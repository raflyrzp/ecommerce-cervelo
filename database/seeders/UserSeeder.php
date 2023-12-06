<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'fullname' => 'admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'alamat' => 'condet',
                'provinsi' => 'DKI Jakarta',
                'kota' => 'Jakarta Timur',
                'kode_pos' => '12345',
                'telp' => '081234567890',
                'rekening' => '675987236578974',
                'role' => 'admin',
                'password' => bcrypt('admin'),
                'join_date' => now()
            ],
            [
                'fullname' => 'pembeli',
                'username' => 'pembeli',
                'email' => 'pembeli@gmail.com',
                'alamat' => 'LA',
                'provinsi' => 'DKI Jakarta',
                'kota' => 'Jakarta Selatan',
                'kode_pos' => '15432',
                'telp' => '081515151515',
                'rekening' => '123456789098765',
                'role' => 'pembeli',
                'password' => bcrypt('pembeli'),
                'join_date' => now()
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
