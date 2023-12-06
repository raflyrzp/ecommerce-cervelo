@extends('pembeli.layout.main') <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

{{-- Bootstrap Icons --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@section('container')
    <section id="home-section" class="hero">
        <div class="home-slider owl-carousel">
            <div class="slider-item js-fullheight">
                <div class="overlay"></div>
                <div class="container-fluid p-0">
                    <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end"
                        data-scrollax-parent="true">
                        <img class="one-third order-md-last img-fluid" style="width: 50em;"
                            src="{{ asset('pembeli/images/bg-banner1.png') }}" alt="">
                        <div class="one-forth d-flex align-items-center ftco-animate"
                            data-scrollax=" properties: { translateY: '70%' }">
                            <div class="text">
                                <span class="subheading">#New Arrival</span>
                                <div class="horizontal">
                                    <h1 class="mb-4 mt-3">Cervello P5X Lamborghini</h1>
                                    <p class="mb-4">A small river named Duden flows by their place and supplies it
                                        with the necessary regelialia. It is a paradisematic country.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-item js-fullheight">
                <div class="overlay"></div>
                <div class="container-fluid p-0">
                    <div class="row d-flex no-gutters slider-text align-items-center justify-content-end"
                        data-scrollax-parent="true">
                        <img class="one-third order-md-last img-fluid" style="width: 50em;"
                            src="{{ asset('pembeli/images/bg-banner2.png') }}" alt="">
                        <div class="one-forth d-flex align-items-center ftco-animate"
                            data-scrollax=" properties: { translateY: '70%' }">
                            <div class="text">
                                <span class="subheading">#New Arrival</span>
                                <div class="horizontal">
                                    <h1 class="mb-4 mt-3">New Bikes Collection</h1>
                                    <p class="mb-4">A small river named Duden flows by their place and supplies it
                                        with the necessary regelialia. It is a paradisematic country.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row no-gutters ftco-services">
                <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">
                        <div class="icon d-flex justify-content-center align-items-center mb-4">
                            <span class="flaticon-bag"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Free Shipping</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">
                        <div class="icon d-flex justify-content-center align-items-center mb-4">
                            <span class="flaticon-customer-service"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Support Customer</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">
                        <div class="icon d-flex justify-content-center align-items-center mb-4">
                            <span class="flaticon-payment-security"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Secure Payments</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">New Bikes Arrival</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($data_produk as $produk)
                    <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
                        <div class="product d-flex flex-column">
                            <a href="{{ route('produk.show', $produk->id) }}" class="img-prod"><img class="img-fluid"
                                    src="{{ asset('storage/produk/' . $produk->image) }}" alt="Colorlib Template">
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3">
                                <div class="d-flex">
                                    <div class="cat">
                                        <span>Lifestyle</span>
                                    </div>
                                    <div class="rating">
                                        <p class="text-right mb-0">
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        </p>
                                    </div>
                                </div>
                                <h3><a href="{{ route('produk.show', $produk->id) }}">{{ $produk->nama_produk }}</a></h3>
                                <div class="pricing">
                                    <p class="price"><span>IDR.
                                            {{ number_format($produk->harga_produk, 0, ',', '.') }},00</span></p>
                                </div>
                                <p class="bottom-area d-flex px-3">
                                    <a href="" class="add-to-cart text-center py-2 mr-1" role="button"
                                        data-bs-toggle="modal" data-bs-target="#addToCart{{ $produk->id }}"><span>Add
                                            to
                                            cart <i class="ion-ios-add ml-1"></i></span></a>
                                    <a href="#" class="buy-now text-center py-2">Buy now<span><i
                                                class="ion-ios-cart ml-1"></i></span></a>
                                </p>
                            </div>
                        </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="addToCart{{ $produk->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="addToCart{{ $produk->id }}Label"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="addToCart{{ $produk->id }}Label">Add to Cart</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('keranjang.store') }}" method="post">
                                    <div class="modal-body">
                                        @csrf
                                        <input type="hidden" name="id_pembeli" value="{{ auth()->user()->id }}">
                                        <input type="hidden" name="id_produk" value="{{ $produk->id }}">
                                        <input type="hidden" name="harga_produk" value="{{ $produk->harga_produk }}">
                                        <p>{{ $produk->stok . ' ' . $produk->satuan }} available</p>
                                        <div class="mb-3">
                                            <label for="jumlah_produk" class="col-form-label">Qty :</label>
                                            <input type="number" name="jumlah_produk" class="form-control"
                                                id="jumlah_produk" value="1" min="1"
                                                max="{{ $produk->stok }}">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    <section class="ftco-section ftco-choose ftco-no-pb ftco-no-pt">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-4">
                    <div class="choose-wrap divider-one img p-5 d-flex align-items-end"
                        style="background-image: url({{ asset('pembeli/images/cervelo5.jpg') }});">

                        <div class="text text-center text-white px-2">
                            <span class="subheading">Bike</span>
                            <h2>Bike's Collection</h2>
                            <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                                language ocean.</p>
                            <p><a href="{{ route('shop') }}" class="btn btn-black px-3 py-2">Shop now</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row no-gutters choose-wrap divider-two align-items-stretch">
                        <div class="col-md-12">
                            <div class="choose-wrap full-wrap img align-self-stretch d-flex align-item-center justify-content-end"
                                style="background-image: url({{ asset('pembeli/images/cervelo4.jpg') }});">
                                <div class="col-md-7 d-flex align-items-center">
                                    <div class="text text-white px-5">
                                        <span class="subheading">Hot Bike</span>
                                        <h2>Cervelo P5</h2>
                                        <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a
                                            large language ocean.</p>
                                        <p><a href="{{ route('shop') }}" class="btn btn-black px-3 py-2">Shop now</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row no-gutters">
                                <div class="col-md-6">
                                    <div
                                        class="choose-wrap wrap img align-self-stretch bg-light d-flex align-items-center">
                                        <div class="text text-center px-5">
                                            <span class="subheading">Summer Bike</span>
                                            <h2>CERVELO AZA</h2>
                                            <p>Separated they live in Bookmarksgrove right at the coast of the
                                                Semantics, a large language ocean.</p>
                                            <p><a href="{{ route('shop') }}" class="btn btn-black px-3 py-2">Shop now</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="choose-wrap wrap img align-self-stretch d-flex align-items-center"
                                        style="background-image: url({{ asset('pembeli/images/cervelo6.jpg') }});">
                                        <div class="text text-center text-white px-5">
                                            <span class="subheading">Bike</span>
                                            <h2>Best Sellers</h2>
                                            <p>Separated they live in Bookmarksgrove right at the coast of the
                                                Semantics, a large language ocean.</p>
                                            <p><a href="{{ route('shop') }}" class="btn btn-black px-3 py-2">Shop now</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section testimony-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="services-flow">
                        <div class="services-2 p-4 d-flex ftco-animate">
                            <div class="icon">
                                <span class="flaticon-bag"></span>
                            </div>
                            <div class="text">
                                <h3>Free Shipping</h3>
                                <p class="mb-0">Separated they live in. A small river named Duden flows</p>
                            </div>
                        </div>
                        <div class="services-2 p-4 d-flex ftco-animate">
                            <div class="icon">
                                <span class="flaticon-heart-box"></span>
                            </div>
                            <div class="text">
                                <h3>Valuable Gifts</h3>
                                <p class="mb-0">Separated they live in. A small river named Duden flows</p>
                            </div>
                        </div>
                        <div class="services-2 p-4 d-flex ftco-animate">
                            <div class="icon">
                                <span class="flaticon-payment-security"></span>
                            </div>
                            <div class="text">
                                <h3>All Day Support</h3>
                                <p class="mb-0">Separated they live in. A small river named Duden flows</p>
                            </div>
                        </div>
                        <div class="services-2 p-4 d-flex ftco-animate">
                            <div class="icon">
                                <span class="flaticon-customer-service"></span>
                            </div>
                            <div class="text">
                                <h3>All Day Support</h3>
                                <p class="mb-0">Separated they live in. A small river named Duden flows</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="heading-section ftco-animate mb-5">
                        <h2 class="mb-4">Our satisfied customer says</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts. Separated they live in</p>
                    </div>
                    <div class="carousel-testimony owl-carousel">
                        <div class="item">
                            <div class="testimony-wrap">
                                <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the
                                        countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Marketing Manager</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap">
                                <div class="user-img mb-4" style="background-image: url(images/person_2.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the
                                        countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Interface Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap">
                                <div class="user-img mb-4" style="background-image: url(images/person_3.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the
                                        countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">UI Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap">
                                <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the
                                        countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Web Developer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap">
                                <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the
                                        countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">System Analyst</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-gallery bg-primary pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 heading-section text-center mb-4 ftco-animate">
                    <h2 class="mb-4">Follow Us On Instagram</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts. Separated they live in</p>
                </div>
            </div>
        </div>
        <div class="container-fluid px-0">
            <div class="row no-gutters">
                <div class="col-md-4 col-lg-2 ftco-animate">
                    <a href="images/gallery-1.jpg" class="gallery image-popup img d-flex align-items-center"
                        style="background-image: url({{ asset('pembeli/images/dom.jpg') }});">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-2 ftco-animate">
                    <a href="images/gallery-2.jpg" class="gallery image-popup img d-flex align-items-center"
                        style="background-image: url({{ asset('pembeli/images/jay.jpg') }});">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-2 ftco-animate">
                    <a href="images/gallery-3.jpg" class="gallery image-popup img d-flex align-items-center"
                        style="background-image: url({{ asset('pembeli/images/owen.jpg') }});">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-2 ftco-animate">
                    <a href="images/gallery-4.jpg" class="gallery image-popup img d-flex align-items-center"
                        style="background-image: url({{ asset('pembeli/images/vinny.jpg') }});">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-2 ftco-animate">
                    <a href="images/gallery-5.jpg" class="gallery image-popup img d-flex align-items-center"
                        style="background-image: url({{ asset('pembeli/images/kwonhyuk.jpg') }});">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-2 ftco-animate">
                    <a href="images/gallery-6.jpg" class="gallery image-popup img d-flex align-items-center"
                        style="background-image: url({{ asset('pembeli/images/dom2.jpg') }});">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-instagram"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>


  
    <div class="modal fade" id="promoModal" tabindex="-1" aria-labelledby="promoLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <section class="ftco-section ftco-deal bg-primary">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 position-relative">
                                    <a href="{{ route('produk.show', $produk_terlaris[0]->id) }}"><img
                                            src="{{ asset('storage/produk/' . $produk_terlaris[0]->image) }}"
                                            class="img-fluid" alt="Product Image">
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <div class="heading-section heading-section-white">
                                        <span class="subheading p-1"
                                            style="background: rgb(212, 0, 0); width:fit-content;">RECOMMENDATION</span>
                                        <h2 class="mb-3">BEST SELLER</h2>
                                    </div>
                                    <div class="text-deal">
                                        <h2><a href="#">{{ $produk_terlaris[0]->nama_produk }}</a></h2>
                                        <p class="price"><span class="price-sale">IDR.
                                                {{ number_format($produk_terlaris[0]->harga_produk, 0, ',', '.') }},00</span>
                                        </p>
                                        <ul class="thumb-deal d-flex mt-4">
                                            <a href="{{ route('produk.show', $produk_terlaris[1]->id) }}">
                                                <li class="img"
                                                    style="background-image: url({{ asset('storage/produk/' . $produk_terlaris[1]->image) }}); background-size: cover; width:150px; height:100px;">
                                                </li>
                                            </a>
                                            <a href="{{ route('produk.show', $produk_terlaris[1]->id) }}">
                                                <li class="img"
                                                    style="background-image: url({{ asset('storage/produk/' . $produk_terlaris[1]->image) }}); background-size: cover; width:150px; height:100px;">
                                                </li>
                                            </a>
                                            <a href="{{ route('produk.show', $produk_terlaris[1]->id) }}">
                                                <li class="img"
                                                    style="background-image: url({{ asset('storage/produk/' . $produk_terlaris[1]->image) }}); background-size: cover; width:150px; height:100px;">
                                                </li>
                                            </a>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var promoModal = new bootstrap.Modal(document.getElementById('promoModal'));

            // You can adjust the delay time (in milliseconds) before showing the modal
            var delayTime = 2000; // 2000 milliseconds = 2 seconds

            setTimeout(function() {
                promoModal.show();
            }, delayTime);
        });
    </script>
@endsection
