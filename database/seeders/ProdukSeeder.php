<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produkData = [
            [
                'nama_produk' => 'P5 FORCE ETAP AXS',
                'harga_produk' => 155002500,
                'stok' => 10,
                'satuan' => 'unit',
                'image' => 'cervelo1.png',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor delectus quo iure dignissimos eius veniam eveniet doloremque, deserunt ducimus facere explicabo officiis nisi, molestiae optio dolorum quaerat minima! Eos, corrupti explicabo. Consequatur dolores officiis hic quia quisquam sint accusantium quibusdam optio! Est dolore adipisci omnis corrupti reiciendis fuga esse tempora sed. Maiores animi, minima provident reprehenderit minus omnis esse, ullam est atque iure debitis labore perspiciatis quos, ad possimus sequi error illum quasi? Ducimus recusandae consequatur accusamus? Ipsa sequi autem distinctio nisi, laudantium repudiandae possimus? Sit mollitia qui doloribus eligendi adipisci, rerum vel ipsam cumque blanditiis odio autem dolore consectetur!',
            ],
            [
                'nama_produk' => 'T1 2011',
                'harga_produk' => 74401200,
                'stok' => 10,
                'satuan' => 'unit',
                'image' => 'cervelo2.png',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor delectus quo iure dignissimos eius veniam eveniet doloremque, deserunt ducimus facere explicabo officiis nisi, molestiae optio dolorum quaerat minima! Eos, corrupti explicabo. Consequatur dolores officiis hic quia quisquam sint accusantium quibusdam optio! Est dolore adipisci omnis corrupti reiciendis fuga esse tempora sed. Maiores animi, minima provident reprehenderit minus omnis esse, ullam est atque iure debitis labore perspiciatis quos, ad possimus sequi error illum quasi? Ducimus recusandae consequatur accusamus? Ipsa sequi autem distinctio nisi, laudantium repudiandae possimus? Sit mollitia qui doloribus eligendi adipisci, rerum vel ipsam cumque blanditiis odio autem dolore consectetur!',
            ],
        ];

        foreach ($produkData as $key => $val) {
            Produk::create($val);
        }
    }
}
