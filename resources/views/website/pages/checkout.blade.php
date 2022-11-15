@extends('layouts.app-minimal')

@section('content')
    <div class="w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 h-screen">
            <div id="contact-detail" class="order-2 p-10 md:order-1 md:p-36">
                <h1 class="text-3xl font-bold">Informasi Kontak</h1>

                <div class="form-wrapper mt-5">
                    <form method="POST" action="">
                        @csrf
                        <div class="flex flex-col gap-2">
                            <label>
                                Email
                            </label>
                            <input type="email" name="email" class="rounded-md border-gray-300 read-only:bg-gray-100"
                                value="" readonly />
                        </div>

                        <div class="flex flex-col gap-2 mt-5">
                            <label>
                                Nama Lengkap
                            </label>
                            <input type="text" name="name" class="rounded-md border-gray-300 read-only:bg-gray-100"
                                value="" readonly />
                        </div>

                        <div class="flex flex-col gap-2 mt-5">
                            <label>
                                Alamat
                            </label>
                            <textarea name="alamat" class="rounded-md border-gray-300 read-only:bg-gray-100" readonly></textarea>
                        </div>

                        <div class="flex flex-col gap-2 mt-5">
                            <label>
                                Nomor Telepon
                            </label>
                            <input type="text" name="notelp" class="rounded-md border-gray-300 read-only:bg-gray-100"
                                value="" readonly />
                        </div>

                        <div class="button mt-5 flex flex-col md:flex-row gap-y-3 justify-between items-center">
                            <input type="submit" name="submit" value="Checkout"
                                class="w-full md:w-auto py-5 px-4 bg-green-600 text-white rounded-md" />

                            <a href="{{ url()->previous() }}" class="text-center md:text-left">Kembali ke Halaman Produk</a>
                        </div>
                    </form>
                </div>
            </div>
            <div id="product-detail" class="bg-gray-100 order-1 p-10 md:order-2 md:p-36">
                <div class="product-header flex justify-between items-center">
                    <div class="product-detail flex items-center gap-x-5">
                        <img src="https://via.placeholder.com/150" class="w-16" />
                        <div class="flex flex-col">
                            <span class="font-bold"></span>
                            <p class="text-italic"></p>
                        </div>
                    </div>
                    <div class="product-price">
                        <span class="font-bold">Rp.</span>
                    </div>
                </div>
                <hr class="mt-3 border-gray-300" />
                <div class="grandtotal flex flex-row justify-between mt-5">
                    <label>Total Belanja</label>

                    <span class="text-2xl font-bold">Rp.</span>
                </div>
            </div>
        </div>
    </div>
@endsection
