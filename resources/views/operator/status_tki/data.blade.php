@extends('operator.main')

@section('title', 'List TKI')
@section('breadcrumbs')
    @php
        $iteration = 1;
    @endphp

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
                        <li class="active">List TKI</li>
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
                        <strong>List TKI</strong>
                    </div>

                </div>
                <div class="card -body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Sponsor</th>
                                <th>Monitoring</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($statusTki as $item)
                                <tr>
                                    <td class="text-center">{{ $iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->sponsor }}</td>
                                    <td>
                                        @if (isset($item->sertifikat_kesehatan) &&
                                                isset($item->sertifikat_blk) &&
                                                isset($item->hasil_validasi) &&
                                                $item->hasil_validasi === 'Approved')
                                            Approved
                                        @elseif (isset($item->sertifikat_kesehatan) && isset($item->sertifikat_blk))
                                            Proses Review Admin Apjati
                                        @elseif (isset($item->sertifikat_kesehatan))
                                            Test BLK
                                        @else
                                            Periksa kesehatan
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $iteration++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
