@extends('components/website.baselayout')

@section('CSSPlace')
    <style>
        .xxxxxx {
            display: none;
        }

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
    <div class="container product-container">
        <div class="row product">
            <table>
                <thead>
                    <tr>
                        <th>Email :</th>
                        <td>
                            <a href="mailto:info@tenun-songket.com">
                                info@tenun-songket.com
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>Telepon :</th>
                        <td>
                            <a href="https://wa.me/+6287861393876">
                                +62 878 613 938 76
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>Alamat :</th>
                        <td>Banjar Dinas Klungah, Desa Wisma Kerta,
                            Kecamatan Sidemen, Kabupaten Karangasem, Bali 80864</td>
                    </tr>
                    <tr>
                        <th>Google Maps</th>
                    </tr>
                </thead>
            </table>

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d505102.41901645117!2d115.43392499999999!3d-8.488427!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf3556e1733ed7fb6!2sBanjar%20Klungah!5e0!3m2!1sen!2sus!4v1665894930230!5m2!1sen!2sus"
                width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
@endsection
