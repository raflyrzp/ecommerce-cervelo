@extends('pembeli/layout/main')

@section('container')
    <!-- Page Content -->

    <div class="hero-wrap hero-bread" style="background-image: url('{{ asset('storage/produk/' . $produk->image) }}');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Shop</span></p>
                    <h1 class="mb-0 bread">Detail Product</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <form action="{{ route('keranjang.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6 mb-5 ftco-animate">
                        <a href="{{ asset('storage/produk/' . $produk->image) }}"
                            class="image-popup prod-img-bg d-flex align-items-center"><img
                                src="{{ asset('storage/produk/' . $produk->image) }}" class="img-fluid"
                                alt="Colorlib Template"></a>
                    </div>
                    <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                        <h3>{{ $produk->nama_produk }}</h3>
                        <div class="rating d-flex">
                            <p class="text-left mr-4">
                                <a href="#" class="mr-2">5.0</a>
                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                            </p>
                            <p class="text-left mr-4">
                                <a href="#" class="mr-2" style="color: #000;">100 <span
                                        style="color: #bbb;">Rating</span></a>
                            </p>
                            <p class="text-left">
                                <a href="#" class="mr-2" style="color: #000;">{{ $sold }} <span
                                        style="color: #bbb;">Sold</span></a>
                            </p>
                        </div>
                        <p class="price"><span>IDR.
                                {{ number_format($produk->harga_produk, 0, ',', '.') }},00</span></p>
                        <p>{{ $produk->deskripsi }}</p>
                        <div class="row mt-4">
                            <div class="w-100"></div>

                            <div class="input-group col-md-6 d-flex mb-3">

                                <span class="input-group-btn mr-2">
                                    <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="jumlah_produk">
                                        <i class="ion-ios-remove"></i>
                                    </button>
                                </span>
                                <input type="hidden" name="id_pembeli" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="id_produk" value="{{ $produk->id }}">
                                <input type="hidden" name="harga_produk" value="{{ $produk->harga_produk }}">
                                <input type="text" id="jumlah_produk" name="jumlah_produk"
                                    class="quantity form-control input-number" value="1" min="1" max="100">
                                <span class="input-group-btn ml-2">
                                    <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="jumlah_produk">
                                        <i class="ion-ios-add"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <p style="color: #000;">{{ $produk->stok }} piece(s) available</p>
                            </div>
                        </div>
                        <p><a href="" class="btn btn-black"><button type="submit" class="text-white">Add to Cart</button></a>
                            <a href="" class="btn btn-primary py-3 px-5">Buy now</a>
                        </p>
                    </div>
                </div>
            </form>




            <div class="row mt-5">
                <div class="col-md-12 nav-link-wrap">
                    <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill"
                            href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Description</a>

                        <a class="nav-link ftco-animate mr-lg-1" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2"
                            role="tab" aria-controls="v-pills-2" aria-selected="false">About</a>

                        <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3"
                            role="tab" aria-controls="v-pills-3" aria-selected="false">Reviews</a>

                    </div>
                </div>
                <div class="col-md-12 tab-wrap">

                    <div class="tab-content bg-light" id="v-pills-tabContent">

                        <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
                            aria-labelledby="day-1-tab">
                            <div class="p-4">
                                <h3 class="mb-4">{{ $produk->nama_produk }}</h3>
                                <p>{{ $produk->deskripsi }}</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
                            <div class="p-4">
                                <h3 class="mb-4">About Cervelo</h3>
                                <p>Cervélo Cycles is a Canadian manufacturer of racing and track bicycles. Cervélo uses CAD, computational fluid dynamics, and wind tunnel testing at a variety of facilities including the San Diego Air and Space Technology Center, in California, US, to aid its designs. Frame materials include carbon fibre. Cervélo currently makes 5 series of bikes: the C series and R series of road bikes, the latter featuring multi-shaped, "Squoval" frame tubes the S series of road bikes and P series of triathlon/time trial bikes, both of which feature airfoil shaped down tubes; and the T series of track bikes. In professional competition, cyclists have ridden Cervélo bicycles to victory in all three of road cycling's grand tours: the Tour de France the Giro d'Italia and the Vuelta a España.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
                            <div class="row p-4">
                                <div class="col-md-7">
                                    <h3 class="mb-4">23 Reviews</h3>
                                    <div class="review">
                                        <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                        <div class="desc">
                                            <h4>
                                                <span class="text-left">Jacob Webb</span>
                                                <span class="text-right">14 March 2018</span>
                                            </h4>
                                            <p class="star">
                                                <span>
                                                    <i class="ion-ios-star-outline"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                </span>
                                                <span class="text-right"><a href="#" class="reply"><i
                                                            class="icon-reply"></i></a></span>
                                            </p>
                                            <p>When she reached the first hills of the Italic Mountains, she had a last view
                                                back on the skyline of her hometown Bookmarksgrov</p>
                                        </div>
                                    </div>
                                    <div class="review">
                                        <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                                        <div class="desc">
                                            <h4>
                                                <span class="text-left">Jacob Webb</span>
                                                <span class="text-right">14 March 2018</span>
                                            </h4>
                                            <p class="star">
                                                <span>
                                                    <i class="ion-ios-star-outline"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                </span>
                                                <span class="text-right"><a href="#" class="reply"><i
                                                            class="icon-reply"></i></a></span>
                                            </p>
                                            <p>When she reached the first hills of the Italic Mountains, she had a last view
                                                back on the skyline of her hometown Bookmarksgrov</p>
                                        </div>
                                    </div>
                                    <div class="review">
                                        <div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
                                        <div class="desc">
                                            <h4>
                                                <span class="text-left">Jacob Webb</span>
                                                <span class="text-right">14 March 2018</span>
                                            </h4>
                                            <p class="star">
                                                <span>
                                                    <i class="ion-ios-star-outline"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                </span>
                                                <span class="text-right"><a href="#" class="reply"><i
                                                            class="icon-reply"></i></a></span>
                                            </p>
                                            <p>When she reached the first hills of the Italic Mountains, she had a last view
                                                back on the skyline of her hometown Bookmarksgrov</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="rating-wrap">
                                        <h3 class="mb-4">Give a Review</h3>
                                        <p class="star">
                                            <span>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                (98%)
                                            </span>
                                            <span>20 Reviews</span>
                                        </p>
                                        <p class="star">
                                            <span>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                (85%)
                                            </span>
                                            <span>10 Reviews</span>
                                        </p>
                                        <p class="star">
                                            <span>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                (98%)
                                            </span>
                                            <span>5 Reviews</span>
                                        </p>
                                        <p class="star">
                                            <span>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                (98%)
                                            </span>
                                            <span>0 Reviews</span>
                                        </p>
                                        <p class="star">
                                            <span>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                (98%)
                                            </span>
                                            <span>0 Reviews</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('.quantity-right-plus').on('click', function (e) {
            e.preventDefault();
            var fieldName = $(this).attr('data-field');
            var currentVal = parseInt($('input[name=' + fieldName + ']').val(), 10);
            if (!isNaN(currentVal)) {
                $('input[name=' + fieldName + ']').val(currentVal + 1);
            } else {
                $('input[name=' + fieldName + ']').val(1);
            }
        });

        $('.quantity-left-minus').on('click', function (e) {
            e.preventDefault();
            var fieldName = $(this).attr('data-field');
            var currentVal = parseInt($('input[name=' + fieldName + ']').val(), 10);
            if (!isNaN(currentVal) && currentVal > 1) {
                $('input[name=' + fieldName + ']').val(currentVal - 1);
            } else {
                $('input[name=' + fieldName + ']').val(1);
            }
        });
    });
</script>
