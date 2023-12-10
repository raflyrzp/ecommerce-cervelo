<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Keranjang;
use App\Models\Pemesanan;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Midtrans\Config as MidtransConfig;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function buyNow($id)
    {
        $selectedProduct = Produk::findOrFail($id);

        return redirect()->route('checkout', ['selectedProducts' => [$selectedProduct->id]]);
    }

    public function checkout(Request $request)
    {
        $selectedProductIds = $request->selectedProducts;
        dd($selectedProductIds);
        $data_pengiriman = Pengiriman::all();
        $data_keranjang = Keranjang::all();

        $subtotal = 0;
        foreach ($data_keranjang as $keranjang) {
            $totalHargaPerItem = $keranjang->produk->harga_produk * $keranjang->jumlah_produk;
            $subtotal += $totalHargaPerItem;
        }

        if ($selectedProductIds) {
            $selectedProducts = Keranjang::whereIn('id_produk', $selectedProductIds)
                ->join('produk', 'keranjang.id_produk', '=', 'produk.id')
                ->select('keranjang.*', 'produk.*', 'produk.stok as stok_tersisa')
                ->get();

            foreach ($selectedProducts as $selectedProduct) {
                if ($selectedProduct->jumlah_produk > $selectedProduct->stok_tersisa) {
                    return redirect()->route('keranjang.index')->with('error', 'Insufficient quantity for product ' . $selectedProduct->nama_produk);
                }
            }

            return view('pembeli.checkout', [
                'selectedProducts' => $selectedProducts,
                'data_pengiriman' => $data_pengiriman,
                'subtotal' => $subtotal,
                'total' => $subtotal,
                'title' => 'Checkout'
            ]);
        } else {
            return redirect()->route('keranjang.index')->with('error', 'No products selected for checkout.');
        }
    }


    public function prosesCheckout(Request $request)
    {
        $request->validate([
            'alamat' => 'required',
            'telp' => 'required|numeric',
            'email' => 'required|email:dns',
            'provinsi' => 'required',
            'kota' => 'required',
            'kode_pos' => 'required|numeric',
            'id_pengiriman' => 'required'
        ]);

        $selectedProductIds = is_array($request->selectedProducts) ? $request->selectedProducts : [$request->selectedProducts];

        $selectedProducts = Keranjang::whereIn('id_produk', $selectedProductIds)->get();

        $totalPrice = 0;
        foreach ($selectedProducts as $product) {
            $totalPrice += $product->total_harga;
            $pemesanan = new Pemesanan();
            $pemesanan->id_pembeli = auth()->user()->id;
            $pemesanan->id_produk = $product->id_produk;
            $pemesanan->total_harga = $totalPrice;
            $pemesanan->jumlah_produk = $product->jumlah_produk;
            $pemesanan->alamat = $request->alamat;
            $pemesanan->telp = $request->telp;
            $pemesanan->provinsi = $request->provinsi;
            $pemesanan->kota = $request->kota;
            $pemesanan->kode_pos = $request->kode_pos;
            $pemesanan->id_pengiriman = $request->id_pengiriman;
            $pemesanan->email = $request->email;
            $pemesanan->tgl_pemesanan = now();
            $pemesanan->status = 'pending';
            $pemesanan->save();

            $produk = Produk::find($product->id_produk);
            $produk->stok -= $product->jumlah_produk;
            $produk->save();

            $product->delete();

            $totalPrice += $pemesanan->total_harga;
        }


        // Set your Merchant Server Key
        MidtransConfig::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        MidtransConfig::$isProduction = config('midtrans.isProduction');
        // Set sanitization on (default)
        MidtransConfig::$isSanitized = config('midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        MidtransConfig::$is3ds = config('midtrans.is3ds');

        $params = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => $totalPrice,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        $transactionId = Pemesanan::where('status', 'pending')->pluck('id');

        $route = route('checkout-success', ['transaction' => $transactionId]);

        return view('pembeli.payment', [
            'snapToken' => $snapToken,
            'totalPrice' => $totalPrice,
            'transactionId' => $transactionId,
            'route' => $route,
            'title' => 'Payment'
        ]);
    }

    public function pendingPayment(Request $request, $pemesananId)
    {
        $pemesanan = Pemesanan::findOrFail($pemesananId);

        if ($pemesanan->status !== 'pending') {
            return redirect()->back()->with('error', 'Invalid order status for payment processing.');
        }

        MidtransConfig::$serverKey = config('midtrans.serverKey');
        MidtransConfig::$isProduction = config('midtrans.isProduction');
        MidtransConfig::$isSanitized = config('midtrans.isSanitized');
        MidtransConfig::$is3ds = config('midtrans.is3ds');

        $params = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => $pemesanan->total_harga,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('pembeli.payment', [
            'snapToken' => $snapToken,
            'totalPrice' => $pemesanan->total_harga,
            'transactionId' => $pemesanan->id,
            'title' => 'Payment'
        ]);
    }

    public function success(Pemesanan $transaction)
    {
        $transaction->status = 'dibayar';
        $transaction->save();

        $stokLatest = $transaction->produk->stok - $transaction->jumlah_barang;

        Produk::where('id', $transaction->produk->id)->update([
            'stok' => $stokLatest,
        ]);

        return view('pembeli.pemesanan', [
            'data_pemesanan' => Pemesanan::latest()->get(),
        ])->with('success', 'Pembayaran Berhasil');
    }
}
