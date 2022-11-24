@extends('components/dashboard.baselayout')

@section('PageAddress', 'Data Pembayaran')

@section('CSSPlace')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css" />
    <style type="text/css">
        #table_bank tr td {
            vertical-align: middle
        }

        #table_bank tr td:first-child {
            text-align: center;
            width: 1%;
            white-space: nowrap;
        }

        #table_bank tr td:nth-child(5) {
            text-align: center;
            width: 1%;
            white-space: nowrap;
        }

        #table_bank tr td:last-child {
            text-align: center;
            width: 1%;
            white-space: nowrap;
        }
    </style>
@endsection

@section('PageContent')
    @component('components/dashboard.card')
        @section('cardTitle', 'Data Pembayaran')

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
    <table id="table_bank" class="table table-striped table-bordered table-responsive">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Transaksi</th>
                <th>Pembayaran</th>
                <th>Jumlah Pembayaran</th>
                <th>Bukti Pembayaran</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $b => $data)
                <tr>
                    <td>{{++$b}}</td>
                    <td>{{$data->invoice_code}}</td>
                    <td>{{$data->payment}}</td>
                    <td>Rp. {{$data->total}}</td>
                    <td><button type="submit" class="btn btn-sm btn-info">
                        <i class="fas fa-image"></i>
                        Lihat Bukti
                    </button></td>
                    <td>
                        @if ($data->status == "Checking Payment")
                        <span class="badge badge-info">Checking Payment</span>
                        @elseif ($data->status == "Payment Failed")
                        <span class="badge badge-danger">Pembayaran Ditolak</span>
                        @else
                        <span class="badge badge-success">Pembayaran Diterima</span>
                        @endif
                    </td>
                    <td>
                        @if ($data->status == "Checking Payment")
                        <form method="POST" action="{{ route('order.payment-update', $data->id) }}">
                            @csrf
                            <input type="hidden" value="a" name="status">
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-check"></i>
                                Terima
                            </button>
                        </form>
                        <br>
                        <form method="POST" action="{{ route('order.payment-update', $data->id) }}">
                            @csrf
                            <input type="hidden" value="d" name="status">
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-close"></i>
                                Tolak
                            </button>
                        </form>
                        <br>
                        @endif
                        <button type="submit" class="btn btn-sm btn-info">
                            <i class="fas fa-list"></i>
                            Detil
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('cardFooter', 'Data Pembayaran')
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
        $("#table_bank").DataTable();
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
