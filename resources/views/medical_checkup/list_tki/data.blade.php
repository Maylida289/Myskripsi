@extends('medical_checkup.main')

@section('title', 'List TKI')
@section('breadcrumbs')


    @if (session('status-upload'))
        <div class="alert alert-success">
            {{ session('status-upload') }}
        </div>
        @php
            session()->flash('status-upload');
        @endphp
    @endif


    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>List TKI</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li>
                            <a href="#">List TKI</a>
                        </li>
                        <li class="active">Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

@endsection

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
                                <th style="text-align: center;">Serifikat Kesehatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_tki as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->sponsor }}</td>
                                    <td class="text-center">
                                        @if ($item->sertifikat_kesehatan === 'null')
                                            <a href="{{ url('medical-checkup/detail-tki/' . $item->id) }}"
                                                class="btn btn-success btn-sm" style="color: white;">
                                                Upload Sertifikat
                                            </a>
                                        @else
                                            <a href="images/{{ $item->sertifikat_kesehatan }}"
                                                class="btn btn-success btn-sm" style="color: white;" target="_blank">Lihat
                                                Foto</a>
                                        @endif
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>

    </div>

@endsection
