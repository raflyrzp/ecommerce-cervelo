@extends('pembeli.layout.main')

@section('container')
    <div class="hero-wrap hero-bread" style="background-image: url('{{ asset('pembeli/images/checkout-bg4.jpg') }}');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
                    <h1 class="mb-0 bread">My Wishlist</h1>
                </div>
            </div>
        </div>
    </div>
    <form id="formCheckout" action="{{ route('checkout') }}" method="get">
        @csrf
        <section class="ftco-section ftco-cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ftco-animate">
                        <div class="cart-list">
                            <table class="table">
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_keranjang as $i => $keranjang)
                                        <tr class="text-center">
                                            <td class="text-center px-5 pb-5" style="vertical-align: middle;">

                                                <style>
                                                    .checkboxKeranjang {
                                                        transform: scale(1.4);
                                                        -webkit-transform: scale(1.4);
                                                    }
                                                </style>
                                                <input class="form-check-input checkboxKeranjang" autocomplete="off"
                                                    id="selectedProducts" type="checkbox" name="selectedProducts[]"
                                                    value="{{ $keranjang->produk->id }}">

                                            </td>

                                            <td class="image-prod">
                                                <img width="100px"
                                                    src="{{ asset('storage/produk/' . $keranjang->produk->image) }}"
                                                    alt="">
                                            </td>

                                            <td class="product-name">
                                                <h3>{{ $keranjang->produk->nama_produk }}</h3>
                                            </td>

                                            <td class="price">
                                                IDR.{{ number_format($keranjang->produk->harga_produk, 0, ',', '.') }},00
                                            </td>

                                            <td class="quantity">
                                                <div class="input-group mb-3">
                                                    <input type="text" name="kuantitas"
                                                        class="quantity form-control input-number quantity-input"
                                                        data-product-id="{{ $keranjang->produk->id }}"
                                                        value="{{ $keranjang->jumlah_produk }}" min="1"
                                                        max="100">
                                                </div>
                                            </td>


                                            <td class="total-price" data-product-id="{{ $keranjang->produk->id }}">
                                                IDR.{{ number_format($keranjang->total_harga, 0, ',', '.') }},00
                                            </td>

                                            <td class="product-remove pr-3">
                                                <form action="{{ route('keranjang.destroy', $keranjang->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        style="background: transparent; border: none; padding: 0;"
                                                        onclick="return confirm('Anda yakin ingin menghapus produk ini?')">
                                                        <a href=""><span class="ion-ios-close"></span></a>
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                        <div class="cart-total mb-3">
                            <h3>Cart Totals</h3>
                            <p class="d-flex">
                                <span>Subtotal</span>
                                <span>IDR.
                                    {{ number_format($subtotal, 0, ',', '.') }},00</span>
                            </p>
                            <p class="d-flex">
                                <span>Delivery</span>
                                <span>IDR. 0</span>
                            </p>
                            <p class="d-flex">
                                <span>Discount</span>
                                <span>0%</span>
                            </p>
                            <hr>
                            <p class="d-flex total-price">
                                <span>Total</span>
                                <span>IDR.
                                    {{ number_format($total, 0, ',', '.') }},00</span>
                            </p>
                        </div>
                        <p class="text-center">


                            <button type="submit" class="btn btn-primary py-3 px-4">Proceed to Checkout</button>

                        </p>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.quantity-input').on('input', function() {
            var productId = $(this).data('product-id');
            var newQuantity = $(this).val();

            $.ajax({
                type: 'POST',
                url: '{{ route('keranjang.updateQuantity') }}',
                data: {
                    productId: productId,
                    newQuantity: newQuantity,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log(data);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
