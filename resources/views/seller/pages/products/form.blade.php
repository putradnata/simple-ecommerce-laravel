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

        @section('cardTitle', 'Management Data Produk')

    @section('cardAction')
        <a class="btn btn-warning" href="{{ url()->previous() }}">Kembali</a>
    @endsection

    @section('cardBody')
        {{-- conditional form tag for CREATE and UPDATE --}}
        @if (!isset($id))
        <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
        @else
        <form method="post" action="{{ route('product.update', $id) }}" enctype="multipart/form-data">
            @method('PUT')
        @endif

        @csrf

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nama Product</label>
            <div class="col-sm-10">
                {{-- example: Form with validation, with error message underneath the input, if the data was wrong when submitted, value still exists --}}
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $product->name) }}"
                    placeholder="Nama produk" name="name" autocomplete="name"/>

                {{-- error message for input type above --}}
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Deskripsi Product</label>
            <div class="col-sm-10">
                {{-- example: Form with validation, with error message underneath the input, if the data was wrong when submitted, value still exists --}}
                <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                    placeholder="Deskripsi produk" name="description" autocomplete="description">{{ old('description', $product->description) }}</textarea>

                {{-- error message for input type above --}}
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Gambar Product</label>
            <div class="col-sm-10">
                {{-- example: Form with validation, with error message underneath the input, if the data was wrong when submitted, value still exists --}}
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image[]" multiple/>

                {{-- error message for input type above --}}
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="qty" class="col-sm-2 col-form-label">Stok</label>
            <div class="col-sm-10">
                {{-- example: Form with validation, with error message underneath the input, if the data was wrong when submitted, value still exists --}}
                <input type="number" min="1" class="form-control @error('qty') is-invalid @enderror" id="qty" value="{{ old('qty', $product->qty) }}"
                    placeholder="Stok produk" name="qty" autocomplete="qty"/>

                {{-- error message for input type above --}}
                @error('qty')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
                {{-- example: Form with validation, with error message underneath the input, if the data was wrong when submitted, value still exists --}}
                <input type="number" min="1" class="form-control @error('price') is-invalid @enderror" id="price" value="{{ old('price', $product->price) }}"
                    placeholder="Harga produk" name="price" autocomplete="price"/>

                {{-- error message for input type above --}}
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="status" class="col-sm-2 col-form-label">Status Produk</label>
            <div class="col-sm-10">
                {{-- example: Form with validation, with error message underneath the input, if the data was wrong when submitted, value still exists --}}
                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" />
                    <option value="">--Pilih Satu--</option>
                    @if(!isset($id))
                        <option value="Active" {{ old('status') == 'Active' ? "selected" : "" }}>Active</option>
                        <option value="Deactive" {{ old('status') == 'Deactive' ? "selected" : "" }}>Deactive</option>
                    @else
                        <option value="Active" {{ old('status') == ($product->status ? "selected" : $product->status == "" ) ? "selected" : "" }}>Active</option>
                        <option value="Deactive" {{ old('status') == ($product->status ? "selected" : $product->status == "" ) ? "selected" : "" }}>Deactive</option>
                    @endif
                </select>
                {{-- error message for input type above --}}
                @error('status')
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
