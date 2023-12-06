@extends('pembeli.layout.main')

@section('container')
    <div class="hero-wrap hero-bread" style="background-image: url('{{ asset('pembeli/images/checkout-bg4.jpg') }}');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
                    <h1 class="mb-0 bread">Payment</h1>
                </div>
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
                        {{ number_format($totalPrice, 0, ',', '.') }},00</span>
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
                        {{ number_format($totalPrice, 0, ',', '.') }},00</span>
                </p>
            </div>
            <p class="text-center">


                <button id="pay-button" class="btn btn-primary py-3 px-4">Pay with Midtrans</button>

            </p>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var payButton = document.getElementById('pay-button');
            if (payButton) {
                payButton.onclick = function() {
                    snap.pay('<?= $snapToken ?>', {
                        onSuccess: function(result) {
                            window.location.href =
                                '{{ route('checkout-success', $transactionId) }}';
                        },
                        onPending: function(result) {
                            document.getElementById('result-json').innerHTML += JSON.stringify(
                                result, null, 2);
                        },
                        onError: function(result) {
                            document.getElementById('result-json').innerHTML += JSON.stringify(
                                result, null, 2);
                        }
                    });
                };
            } else {
                console.error('Element with ID "pay-button" not found.');
            }
        });
    </script>
@endsection
