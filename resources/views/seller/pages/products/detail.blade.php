@extends('components/dashboard.baselayout')

@section('PageAddress', 'Data Produk')

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

        @section('cardTitle', 'Detail Produk')

    @section('cardAction')
        <a class="btn btn-warning" href="{{ url()->previous() }}">Kembali</a>
    @endsection

    @section('cardBody')
        <tr>
            @php
                $image = json_decode($data->image);
            @endphp

            <div class="row">
                <div class="col-4">
                    <img src="{{ url('/product_image/' . $image[0]) }}" class="product-image" alt="Product Image">
                </div>
                <div class="col-4">&nbsp;</div>
                <div class="col-4">&nbsp;</div>
            </div>

            <div class="col-12 product-image-thumbs">
                @for ($i = 0; $i < count($image); $i++)
                    <div class="product-image-thumb active"><img src="{{ url('/product_image/' . $image[$i]) }}"
                            alt="Product Image"></div>
                @endfor
            </div>

            <div class="table-responsive" style="margin-top: 30px;">
                <table class="table table-striped">
                    <tr>
                        <th>Nama Produk: </th>
                        <td>
                            {{ $data->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>Deskripsi: </th>
                        <td>
                            {{ $data->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>Kuantiti</th>
                        <td>
                            {{ $data->qty }}
                        </td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>
                            Rp. {{ number_format($data->price) }}
                        </td>
                    </tr>
                    <tr>
                        <th>Status Barang</th>
                        <td>
                            {{ $data->status }}
                        </td>
                    </tr>
                </table>
            </div>
        </tr>
    @endsection

    @section('cardFooter', '')
@endcomponent
</div>
@endsection

@section('ScriptPlace')
<script>
    $(document).ready(function() {
        $('.product-image-thumb').on('click', function() {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
    })
</script>
@endsection
