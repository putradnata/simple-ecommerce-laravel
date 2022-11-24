@extends('components/website.baselayout')

@section('content')
@section('dataproduct')
    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
        @foreach ($data as $b => $data)
        <div class="card product-item border-0 mb-4">
            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                @php
                    $image = json_decode($data->image);
                @endphp
                @for ($i=0; $i<1; $i++)
                    <img class="img-fluid w-100" src="{{ url('/product_image/' . $image[0]) }}">
                @endfor
            </div>
            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                <h6 class="text-truncate mb-3"></h6>
                <div class="d-flex justify-content-center">
                    <h6>Rp. {{$data->price}}</h6>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light border">
                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Lihat Detil</a>
                <form action={{ route('buyer.addToCart', $data->id) }} method="POST">
                    @csrf
                    <input type="hidden" value="1" name="qty">
                    <a class="btn btn-sm text-dark p-0" onclick="event.preventDefault();
                    this.closest('form').submit();"><i class="fas fa-cart-plus text-primary mr-1"></i>Keranjang
                    </a>
                </form>
            </div>
        </div>
        @endforeach
    </div>
@endsection
@endsection
