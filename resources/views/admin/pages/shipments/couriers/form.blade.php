@extends('components/dashboard.baselayout')

@section('PageAddress', 'Data Jasa Pengiriman')

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

        @section('cardTitle', 'Management Data Jasa Pengiriman')

    @section('cardAction')
        <a class="btn btn-warning" href="{{ url()->previous() }}">Kembali</a>
    @endsection

    @section('cardBody')

        @if ($errors->any())
            <div class="alert alert-danger errorAlert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif



    @endsection

    @section('cardFooter', '')
@endcomponent
</div>
@endsection

@section('ScriptPlace')

@endsection
