@extends('components/website.baselayout')

@section('CSSPlace')
    <style>
        .card img {
            height: 20vh !important;
        }

        .product-card__product--wrapper {
            border-radius: 15px;
            box-shadow: 5px 8px 5px 0px rgb(0 0 0 / 20%);
            -webkit-box-shadow: 5px 8px 5px 0px rgb(0 0 0 / 20%);
            -moz-box-shadow: 5px 8px 5px 0px rgba(0, 0, 0, 0.2);
            width: 100%;
            padding: 1em;
        }

        .product-details {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            align-content: center;
            align-items: center;
            gap: 3em;
            padding: 2em 1em;
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
            <div class="mb-4"
                style="display:flex; flex-direction:row; gap:10px; width:100%; justify-content: space-between;">
                <form method="GET" action="{{ route('buyer.order-history') }}">
                    <input type="hidden" value="Waiting Payment" name="status">
                    @if ($status == 'Waiting Payment')
                        <a class="btn btn-secondary active"
                            onclick="event.preventDefault();
                        this.closest('form').submit();">Menunggu
                            Pembayaran</a>
                    @else
                        <a class="btn btn-secondary"
                            onclick="event.preventDefault();
                        this.closest('form').submit();">Menunggu
                            Pembayaran</a>
                    @endif
                </form>
                <form method="GET" action="{{ route('buyer.order-history') }}">
                    <input type="hidden" value="Checking Payment" name="status">
                    @if ($status == 'Checking Payment' || $status == 'Payment Failed')
                        <a class="btn btn-secondary active"
                            onclick="event.preventDefault();
                        this.closest('form').submit();">Validasi
                            Pembayaran</a>
                    @else
                        <a class="btn btn-secondary"
                            onclick="event.preventDefault();
                        this.closest('form').submit();">Validasi
                            Pembayaran</a>
                    @endif
                </form>
                <form method="GET" action="{{ route('buyer.order-history') }}">
                    <input type="hidden" value="On Process" name="status">
                    @if ($status == 'On Process')
                        <a class="btn btn-secondary active"
                            onclick="event.preventDefault();
                        this.closest('form').submit();">Pengemasan</a>
                    @else
                        <a class="btn btn-secondary"
                            onclick="event.preventDefault();
                        this.closest('form').submit();">Pengemasan</a>
                    @endif
                </form>
                <form method="GET" action="{{ route('buyer.order-history') }}">
                    <input type="hidden" value="Shipping" name="status">
                    @if ($status == 'Shipping')
                        <a class="btn btn-secondary active"
                            onclick="event.preventDefault();
                        this.closest('form').submit();">Pengiriman</a>
                    @else
                        <a class="btn btn-secondary"
                            onclick="event.preventDefault();
                        this.closest('form').submit();">Pengiriman</a>
                    @endif
                </form>
                <form method="GET" action="{{ route('buyer.order-history') }}">
                    <input type="hidden" value="Received" name="status">
                    @if ($status == 'Received')
                        <a class="btn btn-secondary active"
                            onclick="event.preventDefault();
                        this.closest('form').submit();">Selesai</a>
                    @else
                        <a class="btn btn-secondary"
                            onclick="event.preventDefault();
                        this.closest('form').submit();">Selesai</a>
                    @endif
                </form>
                <form method="GET" action="{{ route('buyer.order-history') }}">
                    <input type="hidden" value="Cancelled" name="status">
                    @if ($status == 'Cancelled')
                        <a class="btn btn-secondary active"
                            onclick="event.preventDefault();
                        this.closest('form').submit();">Dibatalkan</a>
                    @else
                        <a class="btn btn-secondary"
                            onclick="event.preventDefault();
                        this.closest('form').submit();">Dibatalkan</a>
                    @endif
                </form>
            </div>
            <div class="col-md-12">
                @if ($status == 'Waiting Payment' || $status == 'Checking Payment' || $status == 'Payment Failed')
                    <table class="table table-striped">
                        <tr>
                            <th>No.</th>
                            <th>Kode Transaksi</th>
                            <th>Pembayaran</th>
                            <th>Jumlah Pembayaran</th>
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
                                    <div style="display: flex; flex-direction:row; gap:10px">
                                        @if ($data->status == 'Waiting Payment')
                                            <a href="{{ route('buyer.payment-view', $data->id) }}"><button type="submit"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fa fa-image"></i><br />
                                                    Unggah Bukti Pembayaran
                                                </button></a>
                                        @endif
                                        <a href="{{ route('buyer.order-detail', $data->id) }}" class="btn btn-success">
                                            <i class="fa fa-list"></i> Detail
                                        </a>

                                        <form method="POST" action="{{ route('buyer.cancel-product', $data->id) }}">
                                            @csrf
                                            <a class="btn btn-danger" style="height: 100%;"
                                                onclick="event.preventDefault();
                                                this.closest('form').submit();"><i
                                                    class="fas fa-times"></i>Selesai</a>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    @php
                        $total = 0;
                        $c = count($data);
                        $order_id = 0;
                        $seller_id = 0;
                    @endphp

                    @foreach ($data as $key => $data)
                        <div class="product-card__product--wrapper">
                            <div style="margin-top: 20px;">
                                <p style="font-weight: 700">Nama Toko: </p>{{ $data['seller_name'] }}
                                ({{ $data['invoice_code'] }})
                            </div>
                            <div style="margin-top: 20px;">
                                <p style="font-weight: 700">ResI: </p> {{ $data['product'][0]['shipper'] }}
                                ({{ $data['product'][0]['airwaybill'] }})
                            </div>

                            @for ($i = 0; $i < count($data['product']); $i++)
                                @php
                                    $total += $data['product'][$i]['price'] * $data['product'][$i]['qty'];
                                    $order_id = $data['product'][0]['order_id'];
                                    $seller_id = $data['product'][0]['seller_id'];
                                @endphp

                                <div class="product-details">
                                    <div class="">
                                        @if ($status === 'Shipping')
                                            <i class="fas fa-truck-loading" style="color:#28a745; font-size:4em;"></i>
                                        @elseif ($status === 'On Process')
                                            <i class="fas fa-box" style="color:#28a745; font-size:4em;"></i>
                                        @elseif ($status === 'Received')
                                            <i class="fas fa-parachute-box" style="color:#28a745; font-size:4em;"></i>
                                        @else
                                            <i class="fas fa-ban" style="color:#28a745; font-size:4em;"></i>
                                        @endif
                                    </div>
                                    <div class="">
                                        <div class="">
                                            <span class="text-sm">
                                                Nama Produk : {{ $data['product'][$i]['product_name'] }}
                                            </span>
                                        </div>
                                        <div class="">
                                            <span class="text-sm">
                                                Kuantiti : {{ $data['product'][$i]['qty'] }}
                                            </span>
                                        </div>
                                        <div class="">Harga :
                                            Rp.{{ $data['product'][$i]['price'] }}</div>
                                    </div>
                                </div>
                            @endfor
                            @if ($status === 'Shipping')
                                <form method="POST" action="{{ route('buyer.receive-product') }}">
                                    @csrf
                                    <input type="hidden" name="seller_id" value="{{ $seller_id }}" />
                                    <input type="hidden" name="order_id" value="{{ $order_id }}" />
                                    <button class="btn btn-primary"
                                        style="width:100%; border-radius:5px; color:#fff;">Barang
                                        Diterima</button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
