<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" style="text-align: center">
        <div
            style="display: flex;display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center; align-items: center; gap: 12px;">
            <span style="font-size: 35px; font-weight:900;">TS</span>
            <span class="brand-text font-weight-light">Tenun Songket</span>
        </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="https://i.ibb.co/LQbqXcG/53571-user.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                @if (Auth::user()->role === 'A')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-dashboard"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('bank.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-credit-card"></i>
                            <p>
                                Data Bank
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-clipboard"></i>
                            <p>
                                Laporan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-truck"></i>
                            <p>
                                Data Pengiriman
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">Pengiriman Hari Ini</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Jasa Pengiriman</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Data Pengguna
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <form method="GET" action="{{ route('user.index') }}">
                                <li class="nav-item">
                                    <input type="hidden" value="A" name="role">
                                    <a class="nav-link" onclick="event.preventDefault();
                                    this.closest('form').submit();">Admin</a>
                                </li>
                            </form>
                            <li class="nav-item">
                                <form method="GET" action="{{ route('user.index') }}">
                                    <li class="nav-item">
                                        <input type="hidden" value="S" name="role">
                                        <a class="nav-link" onclick="event.preventDefault();
                                        this.closest('form').submit();">Seller</a>
                                    </li>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="nav-link" href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <span class="btn btn-danger w-100">
                                    <i class="nav-icon fas fa-sign-out"></i> {{ __('Log Out') }}
                                </span>
                            </a>
                        </form>
                    </li>
                @elseif (Auth::user()->role === 'S')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-dashboard"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('product.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-boxes"></i>
                            <p>
                                Data Produk
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Data Pesanan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">Pesanan Masuk</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Pesanan Dikirim</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Informasi Pesanan</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="nav-link" href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                <span class="btn btn-danger w-100">
                                    <i class="nav-icon fas fa-sign-out"></i> {{ __('Log Out') }}
                                </span>
                            </a>
                        </form>
                    </li>
                @elseif (Auth::user()->role === 'B')
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
