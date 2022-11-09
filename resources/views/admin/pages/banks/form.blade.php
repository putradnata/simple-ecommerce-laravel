@extends('components/dashboard.baselayout')

@section('PageAddress', 'Data Bank')

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
                padding: 0 25vw !important;
            }
        }

        @media screen and (max-width:767px) {}
    </style>
@endsection

@section('PageContent')
    <div class="d-flex justify-content-center">
        @component('components/dashboard.card')
            @section('cardType', 'card-success w-100 justify-content-center')

        @section('cardTitle', 'Management Data Bank')

    @section('cardAction')
        <a class="btn btn-warning" href="{{ url()->previous() }}">Kembali</a>
    @endsection

    @section('cardBody')
        {{-- conditional form tag for CREATE and UPDATE --}}
        @if (!isset($id))
            <form method="post" action="{{ route('bank.store') }}">
        @else
            <form method="post" action="{{ route('bank.update', $id) }}">
                @method('PUT')
        @endif

        @csrf

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                {{-- example: Form with validation, with error message underneath the input, if the data was wrong when submitted, value still exists --}}
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $bank->name) }}"
                    placeholder="Nama pada rekening" name="name" autocomplete="name"/>

                {{-- error message for input type above --}}
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="account_number" class="col-sm-2 col-form-label">Nomor Rekening</label>
            <div class="col-sm-10">
                {{-- example: Form with validation, with error message underneath the input, if the data was wrong when submitted, value still exists --}}
                <input type="text" class="form-control @error('account_number') is-invalid @enderror" id="account_number" value="{{ old('account_number', $bank->account_number) }}"
                    placeholder="Nomor rekening" name="account_number" autocomplete="account_number"/>

                {{-- error message for input type above --}}
                @error('account_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="bank" class="col-sm-2 col-form-label">Bank</label>
            <div class="col-sm-10">
                {{-- example: Form with validation, with error message underneath the input, if the data was wrong when submitted, value still exists --}}
                <select class="form-control @error('bank') is-invalid @enderror" id="bank" name="bank" />
                    <option value="">--Pilih Satu--</option>
                    @if(!isset($id))
                        <option value="BCA" {{ old('bank') }}>BCA</option>
                        <option value="BNI" {{ old('bank') }}>BNI</option>
                        <option value="BRI" {{ old('bank') }}>BRI</option>
                        <option value="Mandiri" {{ old('bank') }}>Mandiri</option>
                        <option value="Cimb Niaga" {{ old('bank') }}>Cimb Niaga</option>
                        <option value="Permata Bank" {{ old('bank') }}>Permata Bank</option>
                    @else
                        <option value="BCA" {{ old('bank') == ($bank->bank ? "selected" : $bank->bank == "" ) ? "selected" : "" }}>BCA</option>
                        <option value="BNI" {{ old('bank') == ($bank->bank ? "selected" : $bank->bank == "" ) ? "selected" : "" }}>BNI</option>
                        <option value="BRI" {{ old('bank') == ($bank->bank ? "selected" : $bank->bank == "" ) ? "selected" : "" }}>BRI</option>
                        <option value="Mandiri" {{ old('bank') == ($bank->bank ? "selected" : $bank->bank == "" ) ? "selected" : "" }}>Mandiri</option>
                        <option value="Cimb Niaga" {{ old('bank') == ($bank->bank ? "selected" : $bank->bank == "" ) ? "selected" : "" }}>Cimb Niaga</option>
                        <option value="Permata Bank" {{ old('bank') == ($bank->bank ? "selected" : $bank->bank == "" ) ? "selected" : "" }}>Permata Bank</option>
                    @endif
                </select>
                {{-- error message for input type above --}}
                @error('bank')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

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
