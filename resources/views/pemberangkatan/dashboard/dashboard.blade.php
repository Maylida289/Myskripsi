@extends('p3mi.main')

@section('title', 'List TKI')
@section('breadcrumbs')

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>List P3MI</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li>
                            <a href="#">List P3MI</a>
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
                        <strong>List P3MI</strong>
                    </div>

                </div>
                <div class="card -body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Sponsor</th>
                                <th>Monitoring</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_p3mi as $item)
                                @if ($item->sponsor == $sponsor)
                                    <tr>
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
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
