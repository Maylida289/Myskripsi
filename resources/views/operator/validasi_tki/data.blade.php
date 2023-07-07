@extends('operator.main')

@section('title', 'Validasi TKI')
@section('breadcrumbs')

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Validasi TKI</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li>
                            <a href="#">Validasi TKI</a>
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
                        <strong>Data Validasi</strong>
                    </div>
                </div>
                <div class="card -body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tgl Lahir</th>
                                <th>Alamat</th>
                                <th>Agama</th>
                                <th>Pendidikan Terakhir</th>
                                <th>No Telfon</th>
                                <th>Validasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($validasiTki as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->tempat_lahir }}</td>
                                    <td>{{ $item->tgl_lahir }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->agama }}</td>
                                    <td>{{ $item->pendidikan }}</td>
                                    <td>{{ $item->no_tlp }}</td>
                                    @if ($item->hasil_validasi === 'Approved')
                                        <td class="text-center"><i class="fa fa-check-circle" style="color: green;"></i>
                                        </td>
                                    @else
                                        <td>{{ $item->hasil_validasi }}</td>
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
