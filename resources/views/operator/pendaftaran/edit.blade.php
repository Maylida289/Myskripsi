@extends('operator.main')

@section('title', 'Pendaftaran TKI')

<style>
    .image-container {
        position: relative;
        display: inline-block;
    }

    .image-container img {
        transition: filter 0.3s ease;
    }

    .image-container .camera-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .image-container .camera-icon i {
        color: white;
        /* Warna ikon menjadi putih */
        font-size: 35px;
        /* Ukuran ikon dapat disesuaikan */
    }

    .image-container .caption {
        position: absolute;
        bottom: -24px;
        /* Jarak tulisan "ubah foto" dari bawah */
        left: 50%;
        transform: translateX(-50%);
        font-size: 14px;
        color: white;
        /* Warna tulisan menjadi putih */
        opacity: 0;
        /* Sembunyikan tulisan awalnya */
        transition: opacity 0.3s ease;
    }

    .image-container:hover img {
        filter: brightness(0.8);
    }

    .image-container:hover .camera-icon {
        opacity: 1;
    }

    .image-container:hover .caption {
        opacity: 1;
        /* Tampilkan tulisan saat hover */
    }

    .input-file {
        /* Tambahkan margin-top sesuai kebutuhan */
        margin-top: 10px;
        margin-bottom: 10px;
    }
</style>


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
                            <form action="{{ url('pendaftarantki/' . $editpendaftarantki->id) }}" method="post"
                                enctype="multipart/form-data">
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
                                <div class="col-md-12 image-container">
                                    <label>KTP</label>
                                    <img src="{{ asset('images/' . $editpendaftarantki->ktp) }}" alt="Gambar Contoh"
                                        style="height: 300px; width: 500px;">
                                    <label for="fileInput" class="camera-icon">
                                        <i class="fas fa-camera"></i>
                                    </label>
                                    <!-- Input tipe file yang akan di-trigger saat ikon kamera ditekan -->
                                    <input type="file" id="fileInput" class="form-control" name="ktp"
                                        class="input-file" accept="image/*" onchange="changeImage(event)">
                                </div>
                                <script>
                                    function changeImage(event) {
                                        const input = event.target;
                                        if (input.files && input.files[0]) {
                                            const reader = new FileReader();

                                            // Ketika pembacaan file selesai, gambar akan diubah
                                            reader.onload = function(e) {
                                                const image = document.querySelector(".image-container img");
                                                image.src = e.target.result;
                                            };

                                            // Baca file sebagai URL data gambar
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }

                                    // Fungsi untuk membuka dialog pilih file saat ikon kamera ditekan
                                    document.querySelector(".camera-icon").addEventListener("click", function() {
                                        const fileInput = document.getElementById("fileInput");
                                        fileInput.click();
                                    });
                                </script>
                                <div class="col-md-12 image-container">
                                    <label>Ijazah</label>
                                    <img id="ijazahImage" src="{{ asset('images/' . $editpendaftarantki->ijazah) }}"
                                        alt="Gambar Contoh" style="height: 300px; width: 500px;">
                                    <label for="ijazahInput" class="camera-icon">
                                        <i class="fas fa-camera"></i>
                                    </label>
                                    <!-- Input tipe file yang akan di-trigger saat ikon kamera ditekan -->
                                    <input type="file" id="ijazahInput" class="form-control" name="ijazah"
                                        accept="image/*" onchange="changeIjazahImage(event)">
                                </div>
                                <script>
                                    function changeIjazahImage(event) {
                                        const input = event.target;
                                        if (input.files && input.files[0]) {
                                            const reader = new FileReader();

                                            // Ketika pembacaan file selesai, gambar akan diubah
                                            reader.onload = function(e) {
                                                const image = document.getElementById("ijazahImage");
                                                image.src = e.target.result;
                                            };

                                            // Baca file sebagai URL data gambar
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }

                                    // Fungsi untuk membuka dialog pilih file saat ikon kamera ditekan
                                    document.querySelector(".camera-icon").addEventListener("click", function() {
                                        const ijazahInput = document.getElementById("ijazahInput");
                                        ijazahInput.click();
                                    });
                                </script>
                                <button type="submit" class="btn btn-success"
                                    style="margin-top: 25px; width: 350px;">Save</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>


        </div>

    </div>

    <!-- Tambahkan library Font Awesome di dalam tag head (pastikan sudah terkoneksi dengan internet) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


@endsection
