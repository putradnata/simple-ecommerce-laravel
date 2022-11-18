@extends('layouts.app-minimal')

@section('content')
    <div class="w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 h-screen">
            <div id="contact-detail" class="order-2 p-10 md:order-1 md:p-36">
                @php
                    $total = 0;
                @endphp
                @foreach ($data as $sum)
                @php
                        $total += $sum->price * $sum->qty;
                @endphp
                @endforeach
                <h1 class="text-3xl font-bold">Informasi Penerima</h1>
                <div class="form-wrapper mt-5">
                    <form method="POST" action="{{ route('buyer.checkout') }}">
                        @csrf
                        <div class="flex flex-col gap-2">
                            <label>
                                Email
                            </label>
                            <input type="email" name="email" class="rounded-md border-gray-300 read-only:bg-gray-100"
                                value="{{Auth::user()->email}}" readonly />
                        </div>

                        <div class="flex flex-col gap-2 mt-5">
                            <label>
                                Nama Penerima
                            </label>
                            <input type="text" name="name" class="rounded-md border-gray-300 read-only:bg-gray-100"
                                 />
                        </div>

                        <div class="flex flex-col gap-2 mt-5">
                            <label>
                                Alamat
                            </label>
                            <textarea name="address" class="rounded-md border-gray-300 read-only:bg-gray-100"></textarea>
                        </div>

                        <div class="flex flex-col gap-2 mt-5">
                            <label>
                                Nomor Telepon
                            </label>
                            <input type="text" name="phone" class="rounded-md border-gray-300 read-only:bg-gray-100"
                                />
                        </div>

                        <div class="flex flex-col gap-2 mt-5">
                            <label>
                                Pembayaran
                            </label>
                            <select class="rounded-md border-gray-300 read-only:bg-gray-100" @error('payment') is-invalid @enderror" id="payment" name="payment" />
                                <option value="">--Pilih Satu--</option>
                                @foreach ($data_bank as $bank)
                                    <option value="({{$bank->bank}}) {{$bank->account_number}}">({{$bank->bank}}) {{$bank->name}} - {{$bank->account_number}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col gap-2 mt-5">
                            <label>
                                Pengiriman
                            </label>
                            <select class="rounded-md border-gray-300 read-only:bg-gray-100" @error('shipper') is-invalid @enderror" id="shipper" name="shipper" />
                                <option value="">--Pilih Satu--</option>
                                <option value="JNE">JNE</option>
                                <option value="J&T">J&T</option>
                                <option value="Pos Indonesia">Pos Indonesia</option>
                                <option value="SiCepat">SiCepat</option>
                                <option value="Ninja Xpress">Ninja Xpress</option>
                                <option value="Tiki">Tiki</option>
                            </select>
                        </div>

                        <input type="hidden" readonly value="{{$total}}" name="total"
                                />

                                <div class="button mt-5 flex flex-col md:flex-row gap-y-3 justify-between items-center">
                            <input type="submit" name="submit" value="Checkout"
                                class="w-full md:w-auto py-5 px-4 bg-green-600 text-white rounded-md" />

                            <a href="{{ url()->previous() }}" class="text-center md:text-left">Kembali ke Halaman Produk</a>
                        </div>
                    </form>
                </div>
            </div>
            <div id="product-detail" class="bg-gray-100 order-1 p-10 md:order-2 md:p-36">
                @foreach ($data as $data)
                <div class="product-header flex justify-between items-center">
                    <div class="product-detail flex items-center gap-x-5">
                        @php
                            $image = json_decode($data->image);
                        @endphp
                        @for ($i=0; $i<1; $i++)
                            <img src="{{ url('/product_image/' . $image[0]) }}" width="150px" height="150px">
                        @endfor
                        <div class="flex flex-col">
                            <span class="font-bold"></span>
                            <p class="text-italic"> Product Name : {{$data->name}}</p>
                            <p class="text-italic"> Qty : {{$data->qty}}</p>
                            <span class="font-bold">Price : Rp. {{$data->price}}</span>
                        </div>
                    </div>

                </div>
                @endforeach
                <hr class="mt-3 border-gray-300" />
                <div class="grandtotal flex flex-row justify-between mt-5">
                    <label>Total Belanja</label>

                    <span class="text-2xl font-bold">Rp. {{$total}}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
