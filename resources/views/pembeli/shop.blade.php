@extends('pembeli.layout.main')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

{{-- Bootstrap Icons --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@section('container')
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-10 order-md-last">
                    <div class="row">
                        @foreach ($data_produk as $produk)
                            <div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
                                <div class="product d-flex flex-column">
                                    <a href="{{ route('produk.show', $produk->id) }}" class="img-prod"><img
                                            class="img-fluid" src="{{ asset('storage/produk/' . $produk->image) }}"
                                            alt="Colorlib Template">
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
                                        <h3><a href="{{ route('produk.show', $produk->id) }}">{{ $produk->nama_produk }}</a>
                                        </h3>
                                        <div class="pricing">
                                            <p class="price"><span>IDR.
                                                    {{ number_format($produk->harga_produk, 0, ',', '.') }},00</span></p>
                                        </div>
                                        <p class="bottom-area d-flex px-3">
                                            <a href="" class="add-to-cart text-center py-2 mr-1" role="button"
                                                data-bs-toggle="modal"
                                                data-bs-target="#addToCart{{ $produk->id }}"><span>Add
                                                    to
                                                    cart <i class="ion-ios-add ml-1"></i></span></a>
                                            <a href="#" class="buy-now text-center py-2" data-bs-toggle="modal"
                                                data-bs-target="#addToCart{{ $produk->id }}">Buy now<span><i
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
                                            <h1 class="modal-title fs-5" id="addToCart{{ $produk->id }}Label">Add to Cart
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('keranjang.store') }}" method="post">
                                            <div class="modal-body">
                                                @csrf
                                                <input type="hidden" name="id_pembeli" value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="id_produk" value="{{ $produk->id }}">
                                                <input type="hidden" name="harga_produk"
                                                    value="{{ $produk->harga_produk }}">
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
                    <div class="row mt-5">
                        <div class="col text-center">
                            @if ($data_produk->lastPage() > 1)
                                {{ $data_produk->appends(request()->except('page'))->links('pembeli.custom-pagination') }}
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-2">
                    <div class="sidebar">
                        <div class="sidebar-box-2">
                            <h2 class="heading">Price Range</h2>
                            <form method="post" class="colorlib-form-2" action="{{ route('pembeli.filterByPrice') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="price_from">Price from:</label>
                                            <div class="form-field">
                                                <i class="icon icon-arrow-down3"></i>
                                                <select name="price_from" id="price_from" class="form-control">
                                                    <option value="1" {{ old('price_from') == 1 ? 'selected' : '' }}>
                                                        IDR. 1,00</option>
                                                    <option value="1000000"
                                                        {{ old('price_from') == 1000000 ? 'selected' : '' }}>IDR.
                                                        1.000.000,00</option>
                                                    <option value="10000000"
                                                        {{ old('price_from') == 10000000 ? 'selected' : '' }}>IDR.
                                                        10.000.000,00</option>
                                                    <option value="50000000"
                                                        {{ old('price_from') == 50000000 ? 'selected' : '' }}>IDR.
                                                        50.000.000,00</option>
                                                    <option value="100000000"
                                                        {{ old('price_from') == 100000000 ? 'selected' : '' }}>IDR.
                                                        100.000.000,00</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="price_to">Price to:</label>
                                            <div class="form-field">
                                                <i class="icon icon-arrow-down3"></i>
                                                <select name="price_to" id="price_to" class="form-control">
                                                    <option value="1000000"
                                                        {{ old('price_to') == 1000000 ? 'selected' : '' }}>IDR.
                                                        1.000.000,00</option>
                                                    <option value="10000000"
                                                        {{ old('price_to') == 10000000 ? 'selected' : '' }}>IDR.
                                                        10.000.000,00</option>
                                                    <option value="50000000"
                                                        {{ old('price_to') == 50000000 ? 'selected' : '' }}>IDR.
                                                        50.000.000,00</option>
                                                    <option value="100000000"
                                                        {{ old('price_to') == 100000000 ? 'selected' : '' }}>IDR.
                                                        100.000.000,00</option>
                                                    <option value="500000000"
                                                        {{ old('price_to') == 500000000 ? 'selected' : '' }}>IDR.
                                                        500.000.000,00</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
