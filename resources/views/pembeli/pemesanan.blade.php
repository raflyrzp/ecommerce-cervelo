@extends('pembeli/layout/main')

@section('container')
    <!-- Page Content -->
    <div class="cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12"><br><br><br>
                    <div class="section-heading mt-5">
                        <h2>Ordering</h2>
                    </div>
                </div>


                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>&nbsp;</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Date</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_pemesanan as $i => $pemesanan)
                            <tr>
                                <td>{{ ($data_pemesanan->currentPage() - 1) * $data_pemesanan->perPage() + $i + 1 }}</td>
                                <td><img src="{{ asset('storage/produk/' . $pemesanan->produk->image) }}" alt=""
                                        width="100px"></td>
                                <td>{{ $pemesanan->produk->nama_produk }}</td>
                                <td>IDR. {{ number_format($pemesanan->produk->harga_produk, 0, ',', '.') }},00</td>
                                <td>{{ $pemesanan->jumlah_produk }}</td>
                                <td>{{ $pemesanan->tgl_pemesanan }}</td>
                                <td>{{ $pemesanan->alamat }}</td>
                                <td> <a id="pay-button"
                                        href="{{ $pemesanan->status === 'pending' ? route('pending-payment', $pemesanan->id) : '' }}"
                                        class="btn
                                @if ($pemesanan->status === 'diproses') btn-default
                                @elseif($pemesanan->status === 'dikirim') btn-info
                                @elseif($pemesanan->status === 'pending') btn-danger
                                @elseif($pemesanan->status === 'diterima') btn-success @endif">{{ $pemesanan->status }}</a>
                                </td>
                                <td>IDR. {{ number_format($pemesanan->total_harga, 0, ',', '.') }},00</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row mb-5">
                <div class="col text-center">
                    @if ($data_pemesanan->lastPage() > 1)
                        {{ $data_pemesanan->appends(request()->except('page'))->links('pembeli.custom-pagination') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function checkout() {
        document.getElementById("formCheckout").submit();
    }
</script>
