<?php

namespace Database\Seeders;

use App\Models\Pengiriman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengirimanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pengirimanData = [
            [
                'nama_pengiriman' => 'JNE',
            ],
            [
                'nama_pengiriman' => 'JNT',
            ],
            [
                'nama_pengiriman' => 'GoSend',
            ],
        ];

        foreach ($pengirimanData as $key => $val) {
            Pengiriman::create($val);
        }
    }
}
