        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('admin/dist/img/cervelo-logo.png') }}" alt="AdminLTE Logo" class="brand-image"
               >
                <span class="brand-text font-weight-light"> | Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('admin/dist/img/default.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Admin</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}"
                                class="nav-link {{ $title === 'Dashboard' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-header">MENU</li>
                        <!-- MASTER DATA -->
                        <li class="nav-item">
                            <a href=""
                                class="nav-link {{ $title === 'Data Admin' || $title === 'Data Pembeli' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-folder"></i>
                                <p>
                                    Master Data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('data_admin') }}"
                                        class="nav-link {{ $title === 'Data Admin' ? 'active' : '' }}">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>Data Administrator</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('data_pembeli') }}"
                                        class="nav-link {{ $title === 'Data Pembeli' ? 'active' : '' }}">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>Data Pembeli</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('produk.index') }}"
                                class="nav-link {{ $title === 'Data Produk' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>
                                    Data Produk
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('pemesanan.index') }}"
                                class="nav-link {{ $title === 'Data Pemesanan' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>
                                    Data Pemesanan
                                </p>
                            </a>
                        </li>

                        <li class="nav-header">LANJUTAN</li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link"
                                onclick="return confirm('Apakah anda yakin ingin Logout?')">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
