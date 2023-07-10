@extends('operator.main')

@section('title', 'Pendaftaran TKI')
@section('breadcrumbs')

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Pendaftarn TKI</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li>
                            <a href="#">Pendaftaran TKI</a>
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
                        <strong>Data Jenjang</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('pendaftarantki/add') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus">Add</i>
                        </a>
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
                                <th>Sponsor</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendaftaran_tki as $item)
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
                                    <td>{{ $item->sponsor }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('pendaftarantki/edit/' . $item->id) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{ url('pendaftarantki/' . $item->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Ingin Menghapus Data ?')">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
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
