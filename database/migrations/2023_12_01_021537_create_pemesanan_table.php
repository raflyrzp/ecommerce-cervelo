<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pembeli');
            $table->unsignedBigInteger('id_produk');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('kode_pos');
            $table->string('alamat');
            $table->string('telp');
            $table->string('email');
            $table->timestamp('tgl_pemesanan');
            $table->integer('jumlah_produk');
            $table->decimal('total_harga', 10, 0);
            $table->enum('status', ['pending', 'dibayar', 'dikirim', 'diterima']);
            $table->unsignedBigInteger('id_pengiriman');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
