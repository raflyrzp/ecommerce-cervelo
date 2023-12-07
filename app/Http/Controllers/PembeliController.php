<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pembeli;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PembeliController extends Controller
{
    function index()
    {

        $produk_terlaris = DB::table('pemesanan')
            ->join('produk', 'pemesanan.id_produk', '=', 'produk.id')
            ->select('produk.*', DB::raw('SUM(pemesanan.jumlah_produk) as total_terjual'))
            ->groupBy('produk.id')
            ->orderByDesc('total_terjual')
            ->take(4)
            ->get();

        $data_produk = Produk::latest()->take(4)->get();

        return view('pembeli.index', [
            'data_produk' => $data_produk,
            'produk_terlaris' => $produk_terlaris,
            'title' => 'Home',
        ]);
    }


    public function shop()
    {
        $data_produk = Produk::latest()->paginate(9);

        return view('pembeli.shop', [
            'data_produk' => $data_produk,
            'title' => 'Shop',
        ]);
    }

    public function filterByPrice(Request $request)
    {

        $request->validate([
            'price_from' => 'nullable|numeric',
            'price_to' => 'nullable|numeric',
        ]);

        $price_from = $request->price_from;
        $price_to = $request->price_to;

        $filtered_produk = Produk::whereBetween('harga_produk', [$price_from, $price_to])->paginate(9);

        return view('pembeli.shop', ['data_produk' => $filtered_produk, 'title' => 'Shop']);
    }

    public function pembeliPemesanan($id)
    {
        $data_pemesanan = Pemesanan::where('id_pembeli', $id)
        ->orderBy('status', 'asc') // 'pending' akan muncul di atas
        ->orderBy('tgl_pemesanan', 'desc') // Urutkan berdasarkan tanggal pemesanan
        ->get();

    return view('pembeli.pemesanan', [
        'data_pemesanan' => $data_pemesanan,
        'title' => 'Order History'
    ]);
    }
}
