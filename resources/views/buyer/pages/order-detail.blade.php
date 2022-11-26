@extends('layouts.app-minimal')

@section('content')
    <div class="w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 h-screen">
            <div id="contact-detail" class="order-2 p-10 md:order-1 md:p-36">
                <h1 class="text-3xl font-bold">Informasi Order :</h1><br>

                <div class="p-8 shadow-md rounded">
                    <div class="flex flex-row justify-between mb-3">
                        <label class="font-bold">Pembayaran : </label>
                        {{ $data->payment }}
                    </div>

                    <div class="flex flex-row justify-between mb-3">
                        <label class="font-bold">Nama Penerima :</label> {{ $data->name }}
                    </div>

                    <div class="flex flex-row justify-between mb-3">
                        <label class="font-bold">Alamat Pengiriman :</label> {{ $data->address }}
                    </div>

                    <div class="flex flex-row justify-between mb-3">
                        <label class="font-bold">Nomor Telepon: </label> {{ $data->phone }}
                    </div>

                    <div class="flex flex-row justify-between mb-3">
                        <label class="font-bold">Ekspedisi :</label> {{ $detail[0]->shipper }}
                    </div>

                </div>

                <h2 class="font-bold text-xl pt-10 pb-5">Daftar Barang</h2>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">No.</th>
                            <th scope="col" class="py-3 px-6">Nama Produk</th>
                            <th scope="col" class="py-3 px-6">Kuantiti</th>
                            <th scope="col" class="py-3 px-6">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detail as $d => $detail)
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
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="py-4 px-6 font-semibold" colspan="3">Jumlah</td>
                            <td class="py-4 px-6 font-bold">
                                Rp. {{ $data->total }}
                            </td>
                        </tr>
                    </tfoot>
                </table>

            </div>

            <div id="product-detail" class="bg-gray-100 order-1 p-10 md:order-2 md:p-36"
                style="background: url({{ asset('assets/shop/images/carousel-1.jpg') }}); background-size:cover;">

            </div>
        </div>
    </div>
@endsection
