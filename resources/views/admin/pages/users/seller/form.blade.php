@extends('components/dashboard.baselayout')

@section('PageAddress', 'Data Seller')

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

        @section('cardTitle', 'Management Data Seller')

    @section('cardAction')
        <a class="btn btn-warning" href="{{ url()->previous() }}">Kembali</a>
    @endsection

    @section('cardBody')
        {{-- conditional form tag for CREATE and UPDATE --}}
        @if (!isset($id))
            <form method="post" action="{{ route('user.store') }}">
            @else
                @if (Auth::user()->role === 'A')
                    <form method="post" action="{{ route('user.update', $id) }}">
                        @method('PUT')
                    @else
                        <form method="post" action="{{ route('seller.update', $id) }}">
                            @method('PUT')
                @endif
        @endif

        @csrf

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nama Penjual</label>
            <div class="col-sm-10">
                {{-- example: Form with validation, with error message underneath the input, if the data was wrong when submitted, value still exists --}}
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    value="{{ old('name', $user->name) }}" placeholder="Masukkan nama penjual" name="name"
                    autocomplete="name" />

                {{-- error message for input type above --}}
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Alamat E-Mail</label>
            <div class="col-sm-10">
                {{-- example: Form with validation, with error message underneath the input, if the data was wrong when submitted, value still exists --}}
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    value="{{ old('email', $user->email) }}" placeholder="Masukkan e-mail penjual" name="email"
                    autocomplete="email" />

                {{-- error message for input type above --}}
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Kata Sandi</label>
            <div class="col-sm-10">
                {{-- example: Form with validation, with error message underneath the input, if the data was wrong when submitted, value still exists --}}
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    placeholder="Masukkan kata sandi penjual" name="password" autocomplete="password" />

                {{-- error message for input type above --}}
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password_confirmation" class="col-sm-2 col-form-label">Konfirmasi Kata Sandi</label>
            <div class="col-sm-10">
                {{-- example: Form with validation, with error message underneath the input, if the data was wrong when submitted, value still exists --}}
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                    id="password_confirmation" placeholder="Masukkan kata sandi penjual sekali lagi"
                    name="password_confirmation" autocomplete="password_confirmation" />

                {{-- error message for input type above --}}
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <input type="hidden" value="S" name="role">

        <div class="form-group row">
            <div class="col-sm-12">
                <div class="d-flex justify-content-end">
                    <input type="submit" value="Submit" class="btn btn-primary justify-content-end" />
                </div>
            </div>
        </div>
        </form>

    @endsection

    @section('cardFooter', '')
@endcomponent
</div>
@endsection

@section('ScriptPlace')

@endsection
