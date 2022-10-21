<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link" style="text-align: center">
                <div style="display: flex;display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center; align-items: center; gap: 12px;">
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
                                <a href="#" class="d-block">test123</a>
                        </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                <li class="nav-item">
                                        <a href="#" class="nav-link">
                                                <i class="nav-icon fas fa-dashboard"></i>
                                                <p>
                                                        Dashboard
                                                </p>
                                        </a>
                                </li>
                                <li class="nav-item">
                                        <a href="#" class="nav-link">
                                                <i class="nav-icon fas fa-boxes"></i>
                                                <p>
                                                        Data Barang
                                                </p>
                                        </a>
                                </li>
                                <li class="nav-item">
                                        <a href="#" class="nav-link">
                                                <i class="nav-icon fas fa-wrench"></i>
                                                <p>
                                                        Data Perbaikan
                                                </p>
                                        </a>
                                </li>
                                <li class="nav-item">
                                        <a href="#" class="nav-link">
                                                <i class="nav-icon fas fa-hand-holding-usd"></i>
                                                <p>
                                                        Transaksi
                                                </p>
                                        </a>
                                </li>
                                <li class="nav-item">
                                        <a href="#" class="nav-link">
                                                <i class="nav-icon fas fa-users"></i>
                                                <p>
                                                        Data Admin
                                                </p>
                                        </a>
                                </li>
                                <li class="nav-item">
                                        <a href="#" class="nav-link">
                                                <i class="nav-icon fas fa-users"></i>
                                                <p>
                                                        Data Customer
                                                </p>
                                        </a>
                                </li>
                                <li class="nav-item">
                                        <a href="#" class="nav-link">
                                                <i class="nav-icon fas fa-clipboard"></i>
                                                <p>
                                                        Laporan
                                                        <i class="fas fa-angle-left right"></i>
                                                </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                        <a href="#" class="nav-link">Transaksi</a>
                                                </li>
                                                <li class="nav-item">
                                                        <a href="#" class="nav-link">Perbaikan</a>
                                                </li>
                                        </ul>
                                </li>
                                <li class="nav-item">
                                        <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <a class="nav-link" href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                                        <span class="btn btn-danger w-100">
                                                                <i class="nav-icon fas fa-sign-out"></i> {{ __('Log Out') }}
                                                        </span>
                                                </a>
                                        </form>
                                </li>
                        </ul>
                </nav>
                <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
</aside>
