<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_produk = Produk::all();
        return view('admin.produk', [
            'data_produk' => $data_produk,
            'title' => 'Data Produk',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_produk' => 'required|unique:Produk,nama_produk',
            'harga_produk' => 'required|numeric',
            'stok' => 'required|numeric',
            'satuan' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/produk', $image->hashName());

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga_produk,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'deskripsi' => $request->deskripsi,
            'image' => $image->hashName(),
        ]);

        return redirect()->route('produk.index')->with(['success' => 'Produk berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produk = Produk::findOrFail($id);

        return view('pembeli.produk', [
            'produk' => $produk,
            'title' => 'Detail Produk'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);

        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'nama_produk' => 'required|unique:Produk,nama_produk,' . $id,
            'harga_produk' => 'required|numeric',
            'stok' => 'required|numeric',
            'satuan' => 'required',
            'deskripsi' => 'required',
        ]);

        $produk = Produk::findOrFail($id);

        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            ]);

            $image = $request->file('image');
            $image->storeAs('public/produk', $image->hashName());

            Storage::delete('public/produk/' . $produk->image);

            $produk->update([
                'nama_produk' => $request->nama_produk,
                'harga_produk' => $request->harga_produk,
                'stok' => $request->stok,
                'satuan' => $request->satuan,
                'deskripsi' => $request->deskripsi,
                'image' => $image->hashName(),
            ]);
        } else {
            $produk->update([
                'nama_produk' => $request->nama_produk,
                'harga_produk' => $request->harga_produk,
                'stok' => $request->stok,
                'satuan' => $request->satuan,
                'deskripsi' => $request->deskripsi,
            ]);
        }

        return redirect()->route('produk.index')->with(['success' => 'Berhasil mengedit sebuah produk.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //get post dengan ID
        $produk = Produk::findOrFail($id);

        //delete gambar
        Storage::delete('public/produk/' . $produk->image);

        // delete post
        $produk->delete();

        //kembali ke index
        return redirect()->route('produk.index')->with(['success' => 'Data berhasil dihapus!']);
    }
}
