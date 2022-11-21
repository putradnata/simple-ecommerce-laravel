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
                <img src="{{ url('files/') }}" width="100%" />
            </div>
            <div class="col-md-6">
                <div id="product-detail">
                    <h2>
                        {{-- {{ $barang->name }} --}}
                    </h2>
                    <h3>
                        {{-- Rp. {{ number_format($barang->price) }} --}}
                    </h3>
                    {{-- @if ($barang->stock === 'A') --}}
                    <span class="badge badge-success">
                        Tersedia
                    </span>
                    {{-- @else
                        <span class="badge badge-danger">
                            Kosong
                        </span>
                    @endif --}}
                    <p>
                        {{-- {{ $barang->description }} --}}
                    </p>
                </div>
                {{-- <form method="get" action="{{ route('consument.transaction.create') }}"> --}}
                {{-- @csrf --}}
                {{-- <input type="hidden" value="{{ $barang->id }}" name="product_id" /> --}}
                <input type="submit" class="btn btn-primary btn-lg text-white buy-now" value="Beli Sekarang">
                {{-- </form> --}}
                {{-- <a href="{{ route('login') }}" class="btn btn-primary btn-lg text-white buy-now">Beli Sekarang</a> --}}
            </div>
        </div>
    </div>
@endsection

@section('dataproduct')
    {{-- @foreach ($otherproducts as $otherproduct) --}}
    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
        <div class="card product-item border-0 mb-4">
            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                {{-- <img class="img-fluid w-100" src="{{ url('files/' . $otherproduct->barang_details[0]->photos) }}"> --}}
            </div>
            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                {{-- <h6 class="text-truncate mb-3">{{ $otherproduct->name }}</h6> --}}
                <div class="d-flex justify-content-center">
                    {{-- <h6>Rp. {{ number_format($otherproduct->price) }}</h6> --}}
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light border">
                {{-- <a href="{{ route('consument.barang.show', $otherproduct->id) }}" class="btn btn-sm text-dark p-0"><i
                            class="fas fa-eye text-primary mr-1"></i>View
                        Detail</a> --}}
            </div>
        </div>
    </div>
    {{-- @endforeach --}}
@endsection
