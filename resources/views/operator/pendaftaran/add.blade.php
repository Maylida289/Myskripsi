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
                            <a href="{{ url('pendaftarantki') }}">Pendaftaran TKI</a>
                        </li>
                        <li class="active">Add</li>
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
                        <strong>Tambah Jenjang</strong>
                    </div>
                    <div class="pull-right">
                        <a href="" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"></i>back
                        </a>
                    </div>
                </div>
                <div class="card -body">

                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="{{ url('pendaftarantki') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label> Nama TKI</label>
                                    <input type="text" name="nama" class="form-control" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label> Jenis Kelamim</label>
                                    <input type="text" name="jenis_kelamin" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label> Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label> Tgl Lahir</label>
                                    <input type="text" name="tgl_lahir" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label> Alamat TKI</label>
                                    <textarea name="alamat" class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label> Agama </label>
                                    <input type="text" name="agama" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label> Pendidikan Terakhir</label>
                                    <input type="text" name="pendidikan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label> No Telfon</label>
                                    <input type="number" name="no_tlp" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-success">Save</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>


        </div>

    </div>

@endsection
