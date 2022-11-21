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
            <div class="col-md-12 mb-4">
                <a class="btn btn-secondary">Semua Pesanan</a>
                <a class="btn btn-secondary">Pesanan Baru</a>
                <a class="btn btn-secondary">Negosiasi</a>
                <a class="btn btn-secondary">Pesanan Diproses</a>
                <a class="btn btn-secondary">Pesanan Selesai</a>
                <a class="btn btn-secondary">Pesanan Dibatalkan</a>
            </div>
            <div class="col-md-12">
                <table class="table table-striped">
                    <tr>
                        <th>No.</th>
                        <th>Order</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>tst</td>
                        <td>
                            <a href="#" class="btn btn-success">
                                <i class="fa fa-check"></i>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
