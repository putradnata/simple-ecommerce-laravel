@extends('layouts.app-minimal')

@section('content')
    <div class="w-full h-screen">
        <div class="container mx-auto h-full my-auto">
            <div class="flex flex-col justify-center items-center justify-content-center h-full align-middle">

                <h1 class="text-xl font-bold text-left w-full">Keranjang</h1>
                <div class="flex flex-row gap-5 w-full">
                    <section class="bg-white rounded-md shadow-lg w-full p-6">
                        <div class="product-card">
                            <div class="product-card__title">
                                <strong class="text-sm">Nama Toko Disini</strong>
                            </div>
                            <div class="product-card__content">
                                <div
                                    class="product-card__product--wrapper flex flex-row gap-2 items-center justify-start px-2 py-4 flex-wrap">
                                    <div class="product-card__content--photo">
                                        <img
                                            src="https://images.tokopedia.net/img/cache/100-square/VqbcmM/2020/11/5/19196e47-8a34-4453-9e9c-e2e7815053a7.jpg.webp?ect=4g" />
                                    </div>
                                    <div class="product-card__content--product-text">
                                        <div class="product-card__content--product-name">
                                            <span class="text-sm">
                                                Baterai Hippo Xiaomi Redmi 7 / Note 8 BN46 4000 mAh Garansi Resmi
                                            </span>
                                        </div>
                                        <div class="product-card__Cotnent--product-price text-sm font-bold">Rp.5555555</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card__title">
                                <strong class="text-sm">Nama Toko Disini</strong>
                            </div>
                            <div class="product-card__content">
                                <div
                                    class="product-card__product--wrapper flex flex-row gap-2 items-center justify-start px-2 py-4 flex-wrap">
                                    <div class="product-card__content--photo">
                                        <img
                                            src="https://images.tokopedia.net/img/cache/100-square/VqbcmM/2020/11/5/19196e47-8a34-4453-9e9c-e2e7815053a7.jpg.webp?ect=4g" />
                                    </div>
                                    <div class="product-card__content--product-text">
                                        <div class="product-card__content--product-name">
                                            <span class="text-sm">
                                                Baterai Hippo Xiaomi Redmi 7 / Note 8 BN46 4000 mAh Garansi Resmi
                                            </span>
                                        </div>
                                        <div class="product-card__Cotnent--product-price text-sm font-bold">Rp.5555555</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section
                        class="bg-white shadow-lg rounded-md p-6 w-full flex flex-col justify-between grow-0 h-fit gap-y-3">
                        <h2 class="font-bold">Ringkasan Belanja</h2>
                        <div class="cart-summary__product-count text-sm flex flex-row justify-between">
                            <div class="cart-summary__product-count--title text-sm">Total Belanja</div>
                            <div class="cart-summary__product-count--price">
                                Rp. 55555
                            </div>
                        </div>
                        <div class="cart-summary__product-count text-sm flex flex-row justify-between">
                            <div class="cart-summary__product-count--title text-sm">Total Diskon</div>
                            <div class="cart-summary__product-count--price">
                                Rp. 0
                            </div>
                        </div>
                        <hr />
                        <div class="cart-summary__product-count text-sm flex flex-row justify-between">
                            <div class="cart-summary__product-count--title text-sm font-bold">Total Harga</div>
                            <div class="cart-summary__product-count--price font-bold">
                                Rp. 55555
                            </div>
                        </div>
                        <div>
                            <button class="bg-green-600 text-white rounded-md p-2 w-full">Beli</button>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
