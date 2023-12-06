<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreKeranjangRequest;
use App\Http\Requests\UpdateKeranjangRequest;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_pembeli = Auth::id();

        $data_keranjang = Keranjang::where('id_pembeli', $id_pembeli)->get();

        $subtotal = 0;

        foreach ($data_keranjang as $keranjang) {
            $totalHargaPerItem = $keranjang->produk->harga_produk * $keranjang->jumlah_produk;
            $subtotal += $totalHargaPerItem;
        }

        return view('pembeli.keranjang', [
            'data_keranjang' => $data_keranjang,
            'subtotal' => $subtotal,
            'total' => $subtotal,
            'title' => 'Cart'
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
            'jumlah_produk' => 'required|numeric',
            'id_produk' => 'required',
            'id_pembeli' => 'required'
        ]);

        $id_pembeli = $request->id_pembeli;
        $produk = Produk::find($request->id_produk);

        if (!$produk) {
            return redirect()->route('home')->with('error', 'Product not found');
        }

        $jumlah_produk = $request->jumlah_produk;
        $total_harga = $request->harga_produk * $jumlah_produk;

        $produk_sama = Keranjang::where('id_pembeli', $id_pembeli)->where('id_produk', $produk->id)->first();

        if ($produk_sama) {
            $produk_sama->jumlah_produk += $jumlah_produk;
            $produk_sama->total_harga += $total_harga;
            $produk_sama->save();
        } else {
            Keranjang::create([
                'id_pembeli' => $id_pembeli,
                'id_produk' => $produk->id,
                'jumlah_produk' => $jumlah_produk,
                'total_harga' => $total_harga,
            ]);
        }

        // $produk->stok -= $jumlah_produk;
        // $produk->save();

        return redirect()->route('home')->with('success', 'Successfully added product to cart');
    }

    /**
     * Display the specified resource.
     */
    public function show(Keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKeranjangRequest $request, Keranjang $keranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $keranjang = Keranjang::findOfFail($id);

        if (!$keranjang) {
            return redirect()->route('keranjang.index')->with('error', 'Cart not found');
        }

        // $jumlah_produk = $keranjang->jumlah_produk;
        // $produk = Produk::find($keranjang->id_produk);

        $keranjang->delete();

        // if ($produk) {
        //     $produk->stok += $jumlah_produk;
        //     $produk->save();
        // }

        return redirect()->route('keranjang.index')->with('success', 'Successfully deleted a product from the cart');
    }

}
