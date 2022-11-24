@extends('components/dashboard.baselayout')

@section('PageAddress', 'Data Produk')

@section('CSSPlace')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css" />
    <style type="text/css">
        #table_product tr td {
            vertical-align: middle
        }

        #table_product tr td:first-child {
            text-align: center;
            width: 1%;
            white-space: nowrap;
        }

        #table_product tr td:nth-child(5) {
            text-align: center;
            width: 1%;
            white-space: nowrap;
        }

        #table_product tr td:last-child {
            text-align: center;
            width: 1%;
            white-space: nowrap;
        }
    </style>
@endsection

@section('PageContent')
    @component('components/dashboard.card')
        @section('cardTitle', 'Data Produk')

    @section('cardAction')
        <a class="btn btn-primary" href="{{ route('product.create') }}">
            <i class="fa fa-plus"></i> Tambah Data Produk
        </a>
    @endsection

@section('cardBody')
    @if (Session::has('success'))
        <div class="alert alert-success successAlert">
            <p>{{ Session::get('success') }}</p>
        </div>
    @elseif(Session::has('error'))
        <div class="alert alert-success errorAlert">
            <p>{{ Session::get('error') }}</p>
        </div>
    @endif
    <table id="table_product" class="table table-striped table-bordered table-responsive">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Produk</th>
                <th>Stok</th>
                <th>Harga</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $b => $data)
                <tr>
                    <td>{{++$b}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->qty}}</td>
                    <td>Rp. {{$data->price}}</td>
                    <td>
                        <form action={{ route('product.destroy', $data->id) }} method="POST">
                        @csrf
                        @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                                Hapus
                            </button>
                        </form>
                        <button type="submit" class="btn btn-sm btn-info">
                            <i class="fas fa-list-alt"></i>
                            Lihat Detil
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('cardFooter', 'Data Produk')
@endcomponent
@endsection

@section('ScriptPlace')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap4.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $("#table_product").DataTable();
    });
</script>

<!-- Alert Fade out -->
<script>
    $(document).ready(function() {
        $(".successAlert").fadeTo(2000, 500).slideUp(500, function() {
            $(".successAlert").slideUp(500);
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(".errorAlert").fadeTo(2000, 500).slideUp(500, function() {
            $(".errorAlert").slideUp(500);
        });
    });
</script>

@endsection
