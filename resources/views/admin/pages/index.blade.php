@extends('components/dashboard.baselayout')

@section('PageAddress', 'Data Admin')

@section('CSSPlace')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css" />
    <style type="text/css">
        #table_admin tr td {
            vertical-align: middle
        }

        #table_admin tr td:first-child {
            text-align: center;
            width: 1%;
            white-space: nowrap;
        }

        #table_admin tr td:nth-child(5) {
            text-align: center;
            width: 1%;
            white-space: nowrap;
        }

        #table_admin tr td:last-child {
            text-align: center;
            width: 1%;
            white-space: nowrap;
        }
    </style>
@endsection

@section('PageContent')

@endsection
