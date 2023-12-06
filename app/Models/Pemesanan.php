<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'pemesanan';

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function pembeli()
    {
        return $this->belongsTo(User::class, 'id_pembeli');
    }
}
