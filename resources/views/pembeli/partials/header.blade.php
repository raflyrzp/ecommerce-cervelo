<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('pembeli/images/logo.png') }}" width="100px"
                alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ $title === 'Home' ? 'active' : '' }}"><a href="{{ route('home') }}"
                        class="nav-link">Home</a></li>
                <li class="nav-item {{ $title === 'Shop' ? 'active' : '' }}"><a href="{{ route('shop') }}"
                        class="nav-link">Shop</a></li>
                <li class="nav-item cta cta-colored {{ $title === 'Cart' ? 'active' : '' }}"><a
                        href="{{ route('keranjang.index') }}" class="nav-link"><span
                            class="icon-shopping_cart"></span>[{{ count(App\Models\Keranjang::all()) }}]</a></li>


                {{-- Bootstrap Icons --}}
                <link rel="stylesheet"
                    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">


                <li class="nav-item dropdown {{ $title === 'Keranjang' || $title === 'Checkout' ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                            src="{{ asset('pembeli/images/profile.jpg') }}" class="rounded-circle" width="18px"
                            height="18px">&nbsp; {{ auth()->user()->username }}</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                        <a class="dropdown-item" href="{{ route('keranjang.index', auth()->user()->id) }}"><i
                                class="bi bi-cart4"></i> Cart</a>
                        <a class="dropdown-item" href="{{ route('pembeli.pemesanan', auth()->user()->id) }}"><i
                                class="bi bi-bag-heart"></i> Ordering</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="return confirm('Anda yakin ingin logout?')"><i class="bi bi-box-arrow-left"></i>
                            Log Out</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
