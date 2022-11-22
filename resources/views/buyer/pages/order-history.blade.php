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
            <div class="col-md-13 mb-4">
                <form method="GET" action="{{ route('buyer.order-history') }}">
                    <input type="hidden" value="Waiting Payment" name="status">
                    @if ($status == "Waiting Payment")
                        <a class="btn btn-secondary active" onclick="event.preventDefault();
                        this.closest('form').submit();">Menunggu Pembayaran</a>
                    @else
                        <a class="btn btn-secondary" onclick="event.preventDefault();
                        this.closest('form').submit();">Menunggu Pembayaran</a>
                    @endif
                </form>
                <form method="GET" action="{{ route('buyer.order-history') }}">
                    <input type="hidden" value="Checking Payment" name="status">
                    @if ($status == "Checking Payment" || $status == "Payment Failed")
                        <a class="btn btn-secondary active" onclick="event.preventDefault();
                        this.closest('form').submit();">Validasi Pembayaran</a>
                    @else
                        <a class="btn btn-secondary" onclick="event.preventDefault();
                        this.closest('form').submit();">Validasi Pembayaran</a>
                    @endif
                </form>
                <form method="GET" action="{{ route('buyer.order-history') }}">
                    <input type="hidden" value="On Process" name="status">
                    @if ($status == "On Process")
                        <a class="btn btn-secondary active" onclick="event.preventDefault();
                        this.closest('form').submit();">Pengemasan</a>
                    @else
                        <a class="btn btn-secondary" onclick="event.preventDefault();
                        this.closest('form').submit();">Pengemasan</a>
                    @endif
                </form>
                <form method="GET" action="{{ route('buyer.order-history') }}">
                    <input type="hidden" value="Shipping" name="status">
                    @if ($status == "Shipping")
                        <a class="btn btn-secondary active" onclick="event.preventDefault();
                        this.closest('form').submit();">Pengiriman</a>
                    @else
                        <a class="btn btn-secondary" onclick="event.preventDefault();
                        this.closest('form').submit();">Pengiriman</a>
                    @endif
                </form>
                <form method="GET" action="{{ route('buyer.order-history') }}">
                    <input type="hidden" value="Received" name="status">
                    @if ($status == "Received")
                        <a class="btn btn-secondary active" onclick="event.preventDefault();
                        this.closest('form').submit();">Selesai</a>
                    @else
                        <a class="btn btn-secondary" onclick="event.preventDefault();
                        this.closest('form').submit();">Selesai</a>
                    @endif
                </form>
                <form method="GET" action="{{ route('buyer.order-history') }}">
                    <input type="hidden" value="Cancelled" name="status">
                    @if ($status == "Cancelled")
                        <a class="btn btn-secondary active" onclick="event.preventDefault();
                        this.closest('form').submit();">Dibatalkan</a>
                    @else
                        <a class="btn btn-secondary" onclick="event.preventDefault();
                        this.closest('form').submit();">Dibatalkan</a>
                    @endif
                </form>
            </div>
            <div class="col-md-12">
                <table class="table table-striped">
                    @if($status == "Waiting Payment" || $status == "Checking Payment" || $status == "Payment Failed")
                    <tr>
                        <th>No.</th>
                        <th>Kode Transaksi</th>
                        <th>Pembayaran</th>
                        <th>Total Pembayaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($data as $d => $data)
                    <tr>
                        <td>{{ ++$d }}.</td>
                        <td>{{ $data->invoice_code }}</td>
                        <td>{{ $data->payment }}</td>
                        <td>Rp. {{ $data->total }}</td>
                        <td>{{ $data->status }}</td>
                        <td>
                        @if ($data->status == 'Waiting Payment')
                        <a href= "{{ route('buyer.payment-view', $data->id) }}"><button type="submit" class="btn btn-sm btn-info">
                            <i class="fa fa-image"></i>
                            Upload Bukti Pembayaran
                        </button></a>
                        @endif
                        <a href="#" class="btn btn-success">
                            <i class="fa fa-list"></i>
                        </a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <th>No.</th>
                        <th>Kode Transaksi</th>
                        <th>Pembayaran</th>
                        <th>Total Pembayaran</th>
                        <th>Status</th>
                    </tr>
                    @foreach ($data as $d => $data)
                    <tr>
                        <td>{{ ++$d }}.</td>
                        <td>{{ $data->invoice_code }}</td>
                        <td>{{ $data->payment }}</td>
                        <td>Rp. {{ $data->total }}</td>
                        <td>{{ $data->status }}</td>
                    </tr>
                    @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
