<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Keranjang;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePemesananRequest;
use App\Http\Requests\UpdatePemesananRequest;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_pemesanan = Pemesanan::all();
        return view('admin.pemesanan', [
            'data_pemesanan' => $data_pemesanan,
            'title' => 'Data Pemesanan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|integer',
            'id_pembeli' => 'required|integer',
            'tgl_pemesanan' => 'required|date',
            'total_harga' => 'required|numeric',
            'jumlah_produk' => 'required|integer',
            'status' => 'required|in:diproses,dikirim,diterima',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kode_pos' => 'required|string',
            'alamat' => 'required|string',
            'telp' => 'required|string',
            'email' => 'required|email',
            'id_pengiriman' => 'required|integer'
        ]);

        $id_pembeli = Auth::id();
        $keranjang_items = Keranjang::where('id_pembeli', $id_pembeli)->get();
        $selected_produk = $request->id_produk;
        $produk_dipesan = $keranjang_items->firstWhere('id_produk', $selected_produk);

        if (!$produk_dipesan) {
            return redirect()->route('keranjang.index')->with('error', 'Produk tidak ada dalam keranjang');
        }

        Pemesanan::create([
            'id_pembeli' => $id_pembeli,
            'id_produk' => $selected_produk,
            'tgl_pemesanan' => now(),
            'jumlah_produk' => $produk_dipesan->jumlah_produk,
            'total_harga' => $produk_dipesan->total_harga,
            'status' => 'diproses',
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kode_pos' => $request->kode_pos,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'email' => $request->email,
            'id_pengiriman' => $request->id_pengiriman,
        ]);


        $produk_dipesan->delete();

        return redirect()->route('keranjang.index')->with('success', 'Pemesanan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_produk' => 'required|integer',
            'id_pembeli' => 'required|integer',
            'tgl_pemesanan' => 'required|date',
            'total_harga' => 'required|numeric',
            'jumlah_produk' => 'required|integer',
            'status' => 'required|in:pending,dibayar,dikirim,diterima',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kode_pos' => 'required|string',
            'alamat' => 'required|string',
            'telp' => 'required|string',
            'email' => 'required|email',
            'id_pengiriman' => 'required|integer'
        ]);

        $pemesanan = Pemesanan::findOrFail($id);

        // Update data Pemesanan
        $pemesanan->update([
            'id_produk' => $request->id_produk,
            'tgl_pemesanan' => $request->tgl_pemesanan,
            'jumlah_produk' => $request->jumlah_produk,
            'total_harga' => $request->total_harga,
            'status' => $request->status,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kode_pos' => $request->kode_pos,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'email' => $request->email,
            'id_pengiriman' => $request->id_pengiriman,
        ]);

        return redirect()->route('pemesanan.index')->with('success', 'Berhasil mengupdate sebuah pemesanan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        //
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,dibayar,dikirim,diterima',
        ]);

        $pemesanan = Pemesanan::findOrFail($id);

        $pemesanan->update([
            'status' => $request->status,
        ]);

        return redirect()->route('pemesanan.index')->with('success', 'Berhasil mengupdate sebuah pemesanan.');
    }
}
