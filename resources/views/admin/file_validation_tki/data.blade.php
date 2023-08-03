@extends('admin.main')

@section('title', 'Validasi Data TKI')
@section('breadcrumbs')

    @if (session('status-validation'))
        <div class="alert alert-success">
            {{ session('status-validation') }}
        </div>
        @php
            session()->flash('status-validation');
        @endphp
    @endif

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Validasi Data TKI</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li>
                            <a href="#">Validasi Data TKI</a>
                        </li>
                        <li class="active">Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

@endsection

<style>
    .approved-text {

        display: inline-block;
        background-color: green;
        color: white;
        padding: 5px 15px;
        text-align: center;
        cursor: default;
    }
</style>

@section('content')

    <div class="content mt-3">

        <div class="animated fadeIn">



            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Data TKI</strong>
                    </div>
                </div>
                <div class="card -body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Nama</th>
                                <th style="text-align: center;">Jenis Kelamin</th>
                                <th style="text-align: center;">Alamat</th>
                                <th style="text-align: center;">Sponsor</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($validasi_berkas as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->sponsor }}</td>
                                    @if ($item->hasil_validasi === 'Approved')
                                        <td class="text-center">
                                            <a href="{{ url('admin/detail-tki/' . $item->id) }}"
                                                class="btn btn-success btn-sm" style="color: white;">
                                                Approved
                                            </a>
                                        </td>
                                    @else
                                        <td class="text-center">
                                            <a href="{{ url('admin/detail-tki/' . $item->id) }}"
                                                class="btn btn-success btn-sm" style="color: white;">
                                                Detail
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>

    </div>

@endsection
