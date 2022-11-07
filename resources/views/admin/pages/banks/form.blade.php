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

        @if ($errors->any())
            <div class="alert alert-danger errorAlert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif

        {{-- conditional form tag for CREATE and UPDATE --}}
        {{-- @if (!isset($request->id))
            <form method="post" action="{{ route('admin-management.store') }}" enctype="multipart/form-data">
            @else
                <form method="post" action="{{ route('admin-management.update', $request->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
        @endif --}}

        {{-- @csrf --}}
        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                {{-- example: Form with validation, with error message underneath the input, if the data was wrong when submitted, value still exists --}}

                {{-- <input type="text" class="form-control @error('name') is-invalid @enderror" id="nama"
                    placeholder="Nama Admin" name="nama" value="{{ old('nama', $request->name) }}" autocomplete="nama"
                    required/> --}}

                {{-- error message for input type above --}}
                {{-- @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror --}}

                <input type="text" class="form-control @error('name') is-invalid @enderror" id="nama"
                    placeholder="Nama Admin" name="nama" autocomplete="nama" required />
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <div class="d-flex justify-content-end">
                    <input type="submit" value="Submit" class="btn btn-primary justify-content-end" />
                </div>
            </div>
        </div>
        {{-- </form> --}}

    @endsection

    @section('cardFooter', '')
@endcomponent
</div>
@endsection

@section('ScriptPlace')

@endsection
