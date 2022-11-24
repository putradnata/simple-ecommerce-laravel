@extends('components/dashboard.baselayout')

@if ($status == "On Process")
@section('PageAddress', 'Data Pesanan Masuk')
@endif
@if ($status == "Shipping")
@section('PageAddress', 'Data Pesanan Dikirim')
@else
@section('PageAddress', 'Data Informasi Pesanan')
@endif


@section('CSSPlace')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css" />
    <style type="text/css">
        #table_orders-sent tr td {
            vertical-align: middle
        }

        #table_orders-sent tr td:first-child {
            text-align: center;
            width: 1%;
            white-space: nowrap;
        }

        #table_orders-sent tr td:nth-child(5) {
            text-align: center;
            width: 1%;
            white-space: nowrap;
        }

        #table_orders-sent tr td:last-child {
            text-align: center;
            width: 1%;
            white-space: nowrap;
        }
    </style>
@endsection

@section('PageContent')
    @component('components/dashboard.card')
        @if ($status == "On Process")
        @section('cardTitle', 'Data Pesanan Masuk')
        @endif
        @if ($status == "Shipping")
        @section('cardTitle', 'Data Pesanan Dikirim')
        @else
        @section('cardTitle', 'Data Informasi Pesanan')
        @endif

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
    <table id="table_orders-sent" class="table table-striped table-bordered table-responsive">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Transaksi</th>
                <th>Penerima</th>
                <th>Alamat Pengiriman</th>
                <th>Ekspedisi Pengiriman</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d => $data)
            <tr>
                <td>{{ ++$d }}.</td>
                <td>{{ $data->invoice_code }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->address }}</td>
                <td>{{ $data->shipper }}</td>
                <td>
                    @if ($data->status == "On Process")
                    <button type="submit" class="btn btn-sm btn-success">
                        <i class="fas fa-list-alt"></i>
                        Upload Resi
                    </button>
                    @endif
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

@if ($status == "On Process")
@section('cardFooter', 'Data Pesanan Masuk')
@endif
@if ($status == "Shipping")
@section('cardFooter', 'Data Pesanan Dikirim')
@else
@section('cardFooter', 'Data Informasi Pesanan')
@endif
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
        $("#table_orders-sent").DataTable();
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
