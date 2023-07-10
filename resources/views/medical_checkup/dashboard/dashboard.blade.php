@extends('medical_checkup.main')

@section('title', 'Dashboard')

@section('breadcrumbs')

    @if (session('login-success'))
        <div class="alert alert-success">
            {{ session('login-success') }}
        </div>
        @php
            session()->flash('login-success');
        @endphp
    @endif

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1 style="color :blue"> Halaman Medical Checkup</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active"><i class="fa fa-dashboard"></i></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 style="margin-left: 10px; margin-top:10px">{{ $totalTki }}</h3>
                            <p style="color:antiquewhite; margin-left: 10px;">Total TKI</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3 style="margin-left: 10px; margin-top:10px">{{ $totalMedical }}</h3>

                            <p style="margin-left: 10px; color:antiquewhite">Medical</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3 style="margin-left: 10px; margin-top:10px">{{ $totalBlk }}</h3>

                            <p style="color:antiquewhite; margin-left: 10px;">BLK</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>

                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3 style="margin-left: 10px; margin-top:10px">0</h3>

                            <p style="color:antiquewhite; margin-left: 10px;">Berangkat</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>

                    </div>
                </div>

                <!-- ./col -->
            </div>
        </div>
    </section>

@endsection
