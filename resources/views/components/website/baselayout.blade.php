<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tenun Songket</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    {{-- <link href="img/favicon.ico" rel="icon"> --}}

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"> --}}
    @yield('CSSPlace')

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/shop/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        {{-- <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div> --}}
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border px-3 mr-1">Tenun</span>Songket</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">

            </div>
            {{-- <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div> --}}
            {{-- <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">0</span>
                </a>
            </div> --}}
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            {{-- <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                    data-toggle="collapse" href="#navbar-vertical"
                    style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Brand</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
            </div> --}}
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span
                                class="text-primary font-weight-bold border px-3 mr-1">Tenun</span>Songket</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="/" class="nav-item nav-link active">Beranda</a>
                            <a href="/about" class="nav-item nav-link">Tentang</a>
                            <a href="/cara-berbelanja" class="nav-item nav-link">Cara Berbelanja</a>

                            @if (Route::has('login'))
                                @auth
                                    <form method="GET" action="{{ route('buyer.order-history') }}">
                                        <input type="hidden" value="Waiting Payment" name="status">
                                        <a class="nav-item nav-link"
                                            onclick="event.preventDefault();
                                    this.closest('form').submit();">Riwayat
                                            Pemesanan</a>
                                    </form>
                                @endauth
                            @endif
                            {{-- <a href="shop.html" class="nav-item nav-link">Shop</a>
                            <a href="detail.html" class="nav-item nav-link">Shop Detail</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="cart.html" class="dropdown-item">Shopping Cart</a>
                                    <a href="checkout.html" class="dropdown-item">Checkout</a>
                                </div>
                            </div>
                            <a href="contact.html" class="nav-item nav-link">Contact</a> --}}
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block d-flex">
                                    @auth

                                        <p style="margin-right:15px;"">Halo, {{ Auth::user()->name }}</p>

                                        <a href="{{ route('buyer.showCart') }}" style="margin-right: 1em;">
                                            <i class="fa fa-shopping-cart"></i>
                                        </a>

                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="route('logout')"
                                                onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                {{ __('Keluar') }}
                                            </a>
                                        </form>
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="text-sm text-gray-700 dark:text-gray-500 underline">Masuk</a>
                                        {{-- @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                  @endif --}}
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                </nav>
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="{{ asset('assets/shop/images/carousel-1.jpg') }}"
                                alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">Dapatkan Kain Menarik
                                        Disini
                                    </h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Kain Tenun Songket Sidemen Berkualitas</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Belanja Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="{{ asset('assets/shop/images/carousel-2.jpg') }}"
                                alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">Dapatkan Kain Menarik
                                        Disini
                                    </h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Kain Tenun Songket Asli Sidemen</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Belanja Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
    @yield('content')
    {{-- <!-- Featured Start -->
    <div class="container-fluid pt-5 xxxxxx">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End --> --}}
    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            @yield('dataproduct')
            {{-- <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">15 Products</p>
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="{{ asset('assets/shop/images/cat-1.jpg') }}" alt="">
      </a>
      <h5 class="font-weight-semi-bold m-0">Men's dresses</h5>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 pb-1">
    <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
      <p class="text-right">15 Products</p>
      <a href="" class="cat-img position-relative overflow-hidden mb-3">
        <img class="img-fluid" src="{{ asset('assets/shop/images/cat-2.jpg') }}" alt="">
      </a>
      <h5 class="font-weight-semi-bold m-0">Women's dresses</h5>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 pb-1">
    <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
      <p class="text-right">15 Products</p>
      <a href="" class="cat-img position-relative overflow-hidden mb-3">
        <img class="img-fluid" src="{{ asset('assets/shop/images/cat-3.jpg') }}" alt="">
      </a>
      <h5 class="font-weight-semi-bold m-0">Baby's dresses</h5>
    </div>
  </div> --}}
        </div>
    </div>
    <!-- Categories End -->
    <!-- Offer Start -->
    {{-- <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="{{ asset('assets/shop/images/offer-1.png') }}" alt="">
  <div class="position-relative" style="z-index: 1;">
    <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
    <h1 class="mb-4 font-weight-semi-bold">Spring Collection</h1>
    <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
  </div>
  </div>
  </div>
  <div class="col-md-6 pb-4">
    <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
      <img src="{{ asset('assets/shop/images/offer-2.png') }}" alt="">
      <div class="position-relative" style="z-index: 1;">
        <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
        <h1 class="mb-4 font-weight-semi-bold">Winter Collection</h1>
        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
      </div>
    </div>
  </div>
  </div>
  </div> --}}
    <!-- Offer End -->
    <!-- Products Start -->
    {{-- <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Trandy Products</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="{{ asset('assets/shop/images/product-1.jpg') }}"
  alt="">
  </div>
  <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
    <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
    <div class="d-flex justify-content-center">
      <h6>$123.00</h6>
      <h6 class="text-muted ml-2"><del>$123.00</del></h6>
    </div>
  </div>
  <div class="card-footer d-flex justify-content-between bg-light border">
    <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
    <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
  </div>
  </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
    <div class="card product-item border-0 mb-4">
      <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
        <img class="img-fluid w-100" src="{{ asset('assets/shop/images/product-2.jpg') }}" alt="">
      </div>
      <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
        <div class="d-flex justify-content-center">
          <h6>$123.00</h6>
          <h6 class="text-muted ml-2"><del>$123.00</del></h6>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-between bg-light border">
        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
    <div class="card product-item border-0 mb-4">
      <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
        <img class="img-fluid w-100" src="{{ asset('assets/shop/images/product-3.jpg') }}" alt="">
      </div>
      <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
        <div class="d-flex justify-content-center">
          <h6>$123.00</h6>
          <h6 class="text-muted ml-2"><del>$123.00</del></h6>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-between bg-light border">
        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
    <div class="card product-item border-0 mb-4">
      <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
        <img class="img-fluid w-100" src="{{ asset('assets/shop/images/product-4.jpg') }}" alt="">
      </div>
      <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
        <div class="d-flex justify-content-center">
          <h6>$123.00</h6>
          <h6 class="text-muted ml-2"><del>$123.00</del></h6>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-between bg-light border">
        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
      </div>
    </div>
  </div>
  </div>
  </div> --}}
    <!-- Products End -->
    {{-- <!-- Subscribe Start -->
    <div class="container-fluid bg-secondary my-5">
        <div class="row justify-content-md-center py-5 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span></h2>
                    <p>Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod
                        duo labore labore.</p>
                </div>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Subscribe End --> --}}
    {{-- <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Just Arrived</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="{{ asset('assets/shop/images/product-1.jpg') }}"
  alt="">
  </div>
  <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
    <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
    <div class="d-flex justify-content-center">
      <h6>$123.00</h6>
      <h6 class="text-muted ml-2"><del>$123.00</del></h6>
    </div>
  </div>
  <div class="card-footer d-flex justify-content-between bg-light border">
    <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
    <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
  </div>
  </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
    <div class="card product-item border-0 mb-4">
      <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
        <img class="img-fluid w-100" src="{{ asset('assets/shop/images/product-2.jpg') }}" alt="">
      </div>
      <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
        <div class="d-flex justify-content-center">
          <h6>$123.00</h6>
          <h6 class="text-muted ml-2"><del>$123.00</del></h6>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-between bg-light border">
        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
    <div class="card product-item border-0 mb-4">
      <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
        <img class="img-fluid w-100" src="{{ asset('assets/shop/images/product-3.jpg') }}" alt="">
      </div>
      <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
        <div class="d-flex justify-content-center">
          <h6>$123.00</h6>
          <h6 class="text-muted ml-2"><del>$123.00</del></h6>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-between bg-light border">
        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
    <div class="card product-item border-0 mb-4">
      <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
        <img class="img-fluid w-100" src="{{ asset('assets/shop/images/product-4.jpg') }}" alt="">
      </div>
      <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
        <div class="d-flex justify-content-center">
          <h6>$123.00</h6>
          <h6 class="text-muted ml-2"><del>$123.00</del></h6>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-between bg-light border">
        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
      </div>
    </div>
  </div>
  </div>
  </div>
  <!-- Products End --> --}}
    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border border-white px-3 mr-1">Tenun</span>Songket
                    </h1>
                </a>
                <p>Penjual kain tenun songket Sidemen asli dan berkualitas di Bali. Banyak pilihan motif dengan harga
                    yang variatif.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Banjar Dinas Klungah, Desa
                    Wisma Kerta,
                    Kecamatan Sidemen, Kabupaten Karangasem, Bali 80864</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@tenun-songket.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+62 878 613 938 76</p>
            </div>
            {{-- <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i
                                    class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our
                                Shop</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop
                                Detail</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping
                                Cart</a>
                            <a class="text-dark mb-2" href="checkout.html"><i
                                    class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact
                                Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i
                                    class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our
                                Shop</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop
                                Detail</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping
                                Cart</a>
                            <a class="text-dark mb-2" href="checkout.html"><i
                                    class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact
                                Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Your Name"
                                    required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe
                                    Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> --}}
        </div>
        {{-- <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">Your Site Name</a>. All Rights
                    Reserved. Designed
                    by
                    <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a><br>
                    Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="{{ asset('assets/shop/images/payments.png') }}" alt="">
  </div>
  </div> --}}
    </div>
    <!-- Footer End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="lib/easing/easing.min.js"></script> --}}
    {{-- <script src="lib/owlcarousel/owl.carousel.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"
        integrity="sha512-0QbL0ph8Tc8g5bLhfVzSqxe9GERORsKhIn1IrpxDAgUsbBGz/V7iSav2zzW325XGd1OMLdL4UiqRJj702IeqnQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Contact Javascript File -->
    {{-- <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script> --}}
    <!-- Template Javascript -->
    <script src="{{ asset('assets/shop/js/main.js') }}"></script>
</body>

</html>
