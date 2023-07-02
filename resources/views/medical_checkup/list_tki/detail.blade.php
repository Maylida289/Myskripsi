@extends('medical_checkup.main')

@section('title', 'Detail TKI')
@section('breadcrumbs')

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>TKI</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li>
                            <a href="">Detail TKI</a>
                        </li>
                        <li class="active">Edit</li>
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
                        <strong>Detail TKI</strong>
                    </div>
                </div>
                <div class="card -body">

                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="">

                                @csrf

                                <div class="form-group">
                                    <label> Nama TKI</label>
                                    <input type="text" name="nama" class="form-control"
                                        value="{{ $detail_tki->nama }}" readonly autofocus required>
                                </div>
                                <div class="form-group">
                                    <label> Jenis Kelamin</label>
                                    <input type="text" name="jenis_kelamin" class="form-control"
                                        value="{{ $detail_tki->jenis_kelamin }}" readonly required>
                                </div>
                                <div class="form-group">
                                    <label> Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control"
                                        value="{{ $detail_tki->tempat_lahir }}" readonly required>
                                </div>
                                <div class="form-group">
                                    <label> Tgl Lahir</label>
                                    <input type="text" name="tgl_lahir" class="form-control"
                                        value="{{ $detail_tki->tgl_lahir }}" readonly required>
                                </div>
                                <div class="form-group">
                                    <label> Alamat</label>
                                    <textarea type="text" name="alamat" class="form-control" readonly>{{ $detail_tki->alamat }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label> Agama </label>
                                    <input type="text" name="agama" class="form-control"
                                        value="{{ $detail_tki->agama }}" readonly required>
                                </div>
                                <div class="form-group">
                                    <label> Pendidikan Terakhir</label>
                                    <input type="text" name="pendidikan" class="form-control"
                                        value="{{ $detail_tki->pendidikan }}" readonly required>
                                </div>
                                <div class="form-group">
                                    <label> No Telfon TKI</label>
                                    <input type="number" name="no_tlp" class="form-control"
                                        value="{{ $detail_tki->no_tlp }}" readonly required>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>


        </div>

    </div>

@endsection
