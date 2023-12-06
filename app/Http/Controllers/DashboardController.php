<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $data_produk = Produk::all();
        $data_pemesanan = Pemesanan::all();
        $data_pembeli = User::where('role', 'pembeli')->get();
        return view('admin.index', [
            'title' => 'Dashboard',
            'data_produk' => $data_produk,
            'data_pemesanan' => $data_pemesanan,
            'data_pembeli' => $data_pembeli
        ]);
    }
}
