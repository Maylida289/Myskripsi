@extends('operator.main')

@section('title', 'Pendaftaran TKI')
@section('breadcrumbs')

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Pendaftaran TKI</h1>
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
                        <strong>Edit Jenjang</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('pendaftarantki') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"></i>back
                        </a>
                    </div>
                </div>
                <div class="card -body">

                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="{{ url('pendaftarantki/' . $editpendaftarantki->id) }}" method="post">
                                @method('patch')
                                @csrf

                                <div class="form-group">
                                    <label> Nama TKI</label>
                                    <input type="text" name="nama" class="form-control"
                                        value="{{ $editpendaftarantki->nama }}" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label> Jenis Kelamin</label>
                                    <input type="text" name="jenis_kelamin" class="form-control"
                                        value="{{ $editpendaftarantki->jenis_kelamin }}" required>
                                </div>
                                <div class="form-group">
                                    <label> Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control"
                                        value="{{ $editpendaftarantki->tempat_lahir }}" required>
                                </div>
                                <div class="form-group">
                                    <label> Tgl Lahir</label>
                                    <input type="text" name="tgl_lahir" class="form-control"
                                        value="{{ $editpendaftarantki->tgl_lahir }}" required>
                                </div>
                                <div class="form-group">
                                    <label> Alamat</label>
                                    <textarea type="text" name="alamat" class="form-control">{{ $editpendaftarantki->alamat }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label> Agama </label>
                                    <input type="text" name="agama" class="form-control"
                                        value="{{ $editpendaftarantki->agama }}" required>
                                </div>
                                <div class="form-group">
                                    <label> Pendidikan Terakhir</label>
                                    <input type="text" name="pendidikan" class="form-control"
                                        value="{{ $editpendaftarantki->pendidikan }}" required>
                                </div>
                                <div class="form-group">
                                    <label> No Telfon TKI</label>
                                    <input type="number" name="no_tlp" class="form-control"
                                        value="{{ $editpendaftarantki->no_tlp }}" required>
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
