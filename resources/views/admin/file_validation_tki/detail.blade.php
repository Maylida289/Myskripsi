@extends('admin.main')

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

<style>
    .button-container {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    .button-approved {
        background-color: green;
        color: white;
        width: 50%;
        margin-right: 8px;
        margin-left: 8px
    }

    .button-rejected {
        background-color: red;
        color: white;
        width: 50%;
        margin-right: 8px;
        margin-left: 8px
    }

    .approved-text {
        display: inline-block;
        background-color: green;
        /* Warna latar belakang hijau */
        color: white;
        /* Warna teks putih */
        padding: 5px 15px;
        /* Jarak antara teks dan kotak */
        border-radius: 5px;
        /* Bentuk sudut kotak */
        width: 328px;
        /* Lebar kotak */
        text-align: center;
        /* Teks di tengah kotak */
        cursor: default;
        /* Menghilangkan efek kursor saat di hover */
    }
</style>

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
                                <div class="form-group">
                                    <label>KTP</label>
                                    <img src="{{ asset('images/' . $detail_tki->ktp) }}" alt="Gambar Contoh"
                                        style="height: 200px; width: 400px;">
                                </div>
                                <div class="form-group">
                                    <label> Ijazah</label>
                                    <img src="{{ asset('images/' . $detail_tki->ijazah) }}" alt="Gambar Contoh"
                                        style="height: 200px; width: 400px;">
                                </div>
                                <td class="text-center">
                                    @if (isset($detail_tki->sertifikat_kesehatan))
                                        <div class="form-group">
                                            <label> Sertifikat Kesehatan</label>
                                            <img src="{{ asset('images/' . $detail_tki->sertifikat_kesehatan) }}"
                                                alt="Gambar Contoh" style="height: 200px; width: 400px;">
                                        </div>
                                    @else
                                        <div>
                                            <label> Sertifikat Kesehatan</label>
                                        </div>
                                        <i class="fa fa-times-circle" style="color: red;"></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if (isset($detail_tki->sertifikat_blk))
                                        <div class="form-group">
                                            <label> Sertifikat BLK</label>
                                            <img src="{{ asset('images/' . $detail_tki->sertifikat_blk) }}"
                                                alt="Gambar Contoh" style="height: 200px; width: 400px;">
                                        </div>
                                    @else
                                        <div>
                                            <label> Sertifikat BLK</label>
                                        </div>
                                        <i class="fa fa-times-circle" style="color: red;"></i>
                                    @endif
                                </td>

                                @if ($detail_tki->sertifikat_blk && $detail_tki->hasil_validasi === 'Approved')
                                    <span class="approved-text">Approved</span>
                                @elseif($detail_tki->sertifikat_blk)
                                    <div class="button-container">
                                        <a href="{{ url('validasi-tki/approved/' . $detail_tki->id) }}"
                                            class="btn btn-success btn-sm d-flex justify-content-center align-items-center"
                                            style="color: white; width: 150px;">
                                            Approved Document
                                        </a>
                                        <a onclick="openPopup()"
                                            class="btn btn-danger btn-sm d-flex justify-content-center align-items-center"
                                            style="color: white; width: 150px;">Rejected</a>
                                    </div>
                                    <div id="popup" style="display: none; margin-top: 20px;">
                                        <input type="text" id="message" placeholder="Enter your reason">
                                        <a href="#" onclick="sendReason()">Send</a>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>

                </div>
            </div>


        </div>

    </div>

    <script>
        function openPopup() {
            document.getElementById("popup").style.display = "block";
        }

        function sendReason() {
            var reason = document.getElementById("message").value;
            var id = <?php echo $detail_tki->id; ?>; // Mendapatkan nilai $detailTki->id dari PHP

            // Bangun URL dengan nilai parameter yang diperlukan
            var url = "{{ url('validasi-tki/rejected/') }}/" + id + "/" + encodeURIComponent(reason);

            // Redirect ke URL yang dibangun
            window.location.href = url;
        }
    </script>

@endsection
