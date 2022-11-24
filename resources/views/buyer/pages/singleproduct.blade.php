@extends('components/website.baselayout')

@section('CSSPlace')
    <style>
        .card img {
            height: 20vh !important;
        }

        .product {
            padding: 65px;
            border-radius: 20px;
            box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;
        }

        @media screen and (min-width: 768px) {
            .otherproduct {
                padding-top: 9em;
            }
        }

        @media screen and (max-width: 767px) {
            .product-container {
                padding: 0 40px !important;
            }

            .product {
                padding: 25px;
                border-radius: 20px;
                box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;
            }

            .container {
                background-color: '#eff0f5';
                margin-top: 6vh;
            }

            .row {
                gap: 50px;
            }

            .buy-now {
                width: 100%;
            }
        }
    </style>
@endsection

@section('content')
    {{-- @include('consument/components/navbar') --}}

    <div class="container product-container">
        <div class="row product">
            <div class="col-md-6 text-center">
                @php
                    $image = json_decode($data->image);
                @endphp
                @for ($i = 0; $i < 1; $i++)
                    <img width="100%" src="{{ url('/product_image/' . $image[0]) }}">
                @endfor
            </div>
            <div class="col-md-6">
                <div id="product-detail">
                    <h2>
                        {{ $data->name }}
                    </h2>
                    <h3>
                        Rp. {{ number_format($data->price) }}
                    </h3>
                    @if ($data->status === 'Active')
                        <span class="badge badge-success">
                            Tersedia
                        </span>
                    @else
                        <span class="badge badge-danger">
                            Kosong
                        </span>
                    @endif
                    <div style="display: flex; gap:40px; margin-top:30px;">
                        <span style="font-weight:bold">Stock Tersedia</span>
                        <p>{{ $data->qty }}</p>
                    </div>
                    <p>
                        {{ $data->description }}
                    </p>

                    @if (Route::has('login'))
                        @auth
                            <form action={{ route('buyer.addToCart', $data->id) }} method="POST">
                                @csrf
                                <input type="number" value="0" name="qty" max="{{ $data->qty }}"
                                    class="form-control" style="margin-bottom:30px;">

                                <a class="btn btn-primary btn-lg text-white buy-now"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();"><i
                                        class="fas fa-cart-plus mr-1"></i>Tambahkan ke Keranjang
                                </a>
                            </form>
                        @endauth
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection

@section('dataproduct')
    @foreach ($datas as $b => $data)
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    @php
                        $image = json_decode($data->image);
                    @endphp
                    @for ($i = 0; $i < 1; $i++)
                        <div
                            style="background: url({{ url('/product_image/' . $image[0]) }}); height:25vh; background-size:cover; background-position:center;">
                        </div>
                    @endfor
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <div class="product-wraps mb-3">
                        <h6 class="text-truncate mb-3">{{ $data->name }}</h6>
                        <span class="badge badge-success">Stock Tersedia: {{ $data->qty }}</span>
                        <div class="d-flex justify-content-center">
                        </div>
                    </div>
                    <h6>Rp. {{ $data->price }}</h6>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="{{ route('buyer.show-product-detail', $data->id) }}" class="btn btn-sm text-dark p-0"><i
                            class="fas fa-eye text-primary mr-1"></i>Lihat
                        Detil</a>

                    @if (Route::has('login'))
                        @auth
                            <form action={{ route('buyer.addToCart', $data->id) }} method="POST">
                                @csrf
                                <input type="hidden" value="1" name="qty">
                                <a class="btn btn-sm text-dark p-0"
                                    onclick="event.preventDefault();
                                this.closest('form').submit();"><i
                                        class="fas fa-cart-plus text-primary mr-1"></i>Keranjang
                                </a>
                            </form>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    @endforeach
@endsection
