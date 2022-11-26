@extends('components/dashboard.baselayout')

@section('PageAddress', 'Data Pengiriman')

@section('CSSPlace')
    <style>
        /* hide arrow input type number */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }

        @media screen and (min-width: 768px) {
            .custom-padding {
                padding: 0 10vw !important;
            }
        }

        @media screen and (max-width:767px) {}
    </style>
@endsection

@section('PageContent')
    <div class="d-flex justify-content-center">
        @component('components/dashboard.card')
            @section('cardType', 'card-success w-100 justify-content-center')

        @section('cardTitle', 'Detail Pengiriman')

    @section('cardAction')
        <a class="btn btn-warning" href="{{ url()->previous() }}">Kembali</a>
    @endsection

    @section('cardBody')
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th style="width:15%;">Nama Pembeli: </th>
                    <td>
                        {{ $data[0]->name }}
                    </td>
                </tr>
                <tr>
                    <th>Alamat Pengiriman: </th>
                    <td>
                        {{ $data[0]->address }}
                    </td>
                </tr>
                <tr>
                    <th>Nomor Telepon: </th>
                    <td>
                        {{ $data[0]->phone }}
                    </td>
                </tr>
                <tr>
                    <th>Ekspedisi Pengiriman: </th>
                    <td>
                        {{ $data[0]->shipper }}
                    </td>
                </tr>
            </table>
        </div>
        <div style="padding: 15px 0px;">
            <h4 style="font-weight:600">Daftar Produk</h4>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class=" text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th
                            scope="col" ">No.</th>
                                                                                                                                        <th scope="col" ">
                            Nama
                            Produk
                        </th>
                        <th
                            scope="col" ">Kuantiti</th>
                                                                                                                                        <th scope="col" ">
                            Harga
                        </th>
                    </tr>
                </thead>
                @php
                    $total = 0;
                @endphp
                <tbody>
                    @foreach ($data as $d => $detail)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="py-4 px-6">
                                {{ ++$d }}.
                            </td>
                            <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $detail->product_name }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $detail->qty }}
                            </td>
                            <td class="py-4 px-6">
                                Rp.
                                {{ $detail->price }}
                            </td>
                        </tr>
                        @php
                            $total += $detail->price * $detail->qty;
                        @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td class="py-4 px-6" colspan="3" style="font-weight: 900; text-align:center;">Jumlah Transaksi
                        </td>
                        <td class="py-4 px-6 font-bold" style="font-weight: 600">
                            Rp. {{ $total }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <p style="font-weight:600;">Resi Pengiriman</p>

        <form action="{{ route('order.store-shipping', $data[0]->order_id) }}" method="POST">
            @csrf
            <div class="form-group row">
                <input type="text" class="form-control col-2" name="airwaybill" />
                <button class="btn btn-success ml-3" type="submit">Simpan</button>
            </div>
        </form>
    @endsection
@endcomponent
</div>
@endsection

@section('ScriptPlace')
@endsection
