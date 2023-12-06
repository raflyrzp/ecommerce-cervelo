@extends('pembeli/layout/main')

@section('container')
    <!-- Page Content -->
    <div class="cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12"><br><br><br>
                    <div class="section-heading mt-5">
                        <h2>Pemesanan</h2>
                    </div>
                </div>


                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>&nbsp;</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Date</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Total Price</th>
                            {{-- <th>Telp</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_pemesanan as $i => $pemesanan)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td><img src="{{ asset('storage/produk/' . $pemesanan->produk->image) }}" alt=""
                                        width="100px"></td>
                                <td>{{ $pemesanan->produk->nama_produk }}</td>
                                <td>{{ $pemesanan->produk->harga_produk }}</td>
                                <td>{{ $pemesanan->jumlah_produk }}</td>
                                <td>{{ $pemesanan->tgl_pemesanan }}</td>
                                <td>{{ $pemesanan->alamat }}</td>
                                <td> <a id="pay-button" href="{{ $pemesanan->status === 'pending' ? route('pending-payment', $pemesanan->id) : '' }}"
                                        class="btn
                                @if ($pemesanan->status === 'diproses') btn-default
                                @elseif($pemesanan->status === 'dikirim') btn-info
                                @elseif($pemesanan->status === 'pending') btn-danger
                                @elseif($pemesanan->status === 'diterima') btn-success @endif">{{ $pemesanan->status }}</a>
                                </td>
                                <td>IDR. {{ number_format($pemesanan->total_harga, 0, ',', '.') }},00</td>
                                {{-- <td>{{ $pemesanan->telp }}</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

<script>
    function checkout() {
        document.getElementById("formCheckout").submit();
    }
</script>
