@extends('components/dashboard.baselayout')

@section('PageAddress', 'Data Admin')

@section('CSSPlace')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css" />
    <style type="text/css">
        @media screen and (min-width: 768px) {
            .custom-padding {
                padding: 0 10vw !important;
            }
        }

        .card {
            width: 100vw;
        }
    </style>
@endsection

@section('PageTitle')
    Profile
@endsection
@section('PageContent')
    <div class="d-flex justify-content-center">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="https://i.ibb.co/LQbqXcG/53571-user.png"
                        alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>
                @if(Auth::user()->role = "A")
                    <p class="text-muted text-center">Admin</p>
                @else
                    <p class="text-muted text-center">Penjual</p>
                @endif
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Surel</b> <a class="float-right">{{Auth::user()->email}}</a>
                    </li>
                </ul>
                <a href="#" class="btn btn-primary btn-block"><b>Edit Profil</b></a>
            </div>
        </div>
    </div>
@endsection
