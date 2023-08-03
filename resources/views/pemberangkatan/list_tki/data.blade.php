@extends('pemberangkatan.main')

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
                    <h1>List Pemberangkatan</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li>
                            <a href="#">List Pemberangkatan</a>
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

            {{-- fungsi redirect tools --}}
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>List Pemberangkatan</strong>
                    </div>

                </div>
                <div class="card -body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Nama</th>
                                <th style="text-align: center;">Alamat</th>
                                <th style="text-align: center;">Sponsor</th>
                                <th style="text-align: center;">Paspor dan Visa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_tki as $item)
                                @if ($item->hasil_validasi === 'Approved')
                                    <tr>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->sponsor }}</td>
                                        @if (isset($item->paspor) && isset($item->visa))
                                            <td class="text-center"><i class="fa fa-check-circle" style="color: green;"></i>
                                            </td>
                                        @else
                                            <td class="text-center">
                                                <a href="{{ url('pemberangkatan/detail-tki/' . $item->id) }}"
                                                    class="btn btn-success btn-sm" style="color: white;">
                                                    Upload Paspor & Visa
                                                </a>
                                            </td>
                                        @endif

                                    </tr>
                                @endif
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
