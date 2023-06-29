@extends('admin.main')

@section('title', 'Validasi Data TKI')
@section('breadcrumbs')

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
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendaftaran_tki as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td class="text-center">
                                        <a href="" class="btn btn-primary btn-sm">
                                            <i class="fa fa-check"></i>
                                        </a>
                                        <form action="" class="d-inline">
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
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
