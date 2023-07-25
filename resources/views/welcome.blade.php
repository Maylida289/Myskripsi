<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial;
            font-size: 17px;
        }

        .container {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
        }

        .container img {
            vertical-align: middle;
        }

        .container .content {
            position: absolute;
            bottom: 0;
            background: rgb(0, 0, 0);
            /* Fallback color */
            background: rgba(0, 0, 0, 0.5);
            /* Black background with 0.5 opacity */
            color: #f1f1f1;
            width: 100%;
            padding: 20px;
        }
    </style>

    <style>
        .login-link {
            position: absolute;
            top: 10px;
            right: 30px;
            padding: 8px 12px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            `
        }

        .login-link:hover {
            background-color: #0056b3;
        }
    </style>

    <style>
        .navbar-brand {
            font-size: 30px;
            /* Atur ukuran font sesuai kebutuhan */
            height: 50px;
            line-height: 50px;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">APJATI</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                    <!-- Tambahkan lebih banyak menu navbar sesuai kebutuhan -->
                    <!-- Misalnya: <li class="nav-item"><a class="nav-link" href="#">Contact</a></li> -->
                </ul>
            </div>
        </div>
        <div style="display: flex; justify-content: flex-end; padding: 1rem;">
            <a href="{{ url('/login') }}" class="login-link"
                style="text-decoration: none; padding: 0.5rem 1rem; color: #333; background-color: #ffffff; border: 1px solid #8ac3ff; border-radius: 4px; margin-right: 10px;">Login</a>
        </div>
    </nav>


    {{-- div untuk image halaman atas --}}
    <br><br>
    <div class="container">
        <img src="{{ asset('style/images/TKIreal.jpg') }}" alt="Notebook" style="width:800px;">
        <div class="content">
            <h1>Info Terkini !</h1>
            <p> Pemberangkatan Pekerja Migran sudah mulai dilaksanakan. <br>
                Melihat keadaan yang memungkinkan membuat pemerintah sepakat untuk bekerja sama dengan beberapa
                perusahaan penyalur Pekerja Migran Indonesia dalam pemberangkatan Pekerja Migran.
            </p>
        </div>
    </div><br><br>
    <hr>
    <h1 style="margin-left: 40px"> Welcome Tenaga Kerja Indoensia !</h1> <br><br>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card">
                <img src="{{ asset('style/images/jaminan kesehatan.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Jaminan Kesehatan</h5>
                    <p class="card-text">Setiap calon Pekerja Migran yang ingin berangkat akan mendapatkan Asuransi
                        Kesehatan sebanyak dua kali.</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <img src="{{ asset('style/images/grupppl.jpg') }}" class="card-img-top" style="height: 300px"
                    alt="perlindungan tki ">
                <div class="card-body">
                    <h5 class="card-title">Pelindungan PMI</h5>
                    <p class="card-text"> Setiap Perusahaan Penyalur akan bertanggung jawab untuk melindungi dan
                        mnegawasi setiap calon Pekerja Migran.</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <img src="{{ asset('style/images/TKI vector.png') }}" class="card-img-top" style="height: 320px"
                    alt="perjalanan tki">
                <div class="card-body">
                    <h5 class="card-title">Perjalanan Aman</h5>
                    <p class="card-text">Semua calon Pekerja Migran akan diberikan rasa aman dan nyaman dalam
                        pemberangkatan.</p>
                </div>
            </div>
        </div>
    </div><br><br>
    <hr><br><br>
    <h3 style="margin-left: 30px"> Proses Perekrutan TKI </h3><br>
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0" style="color: #007bff">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">1. Pendaftaran</h5>
                        <p class="card-text">Tahap Pertama yang dikakukan pada perekrutan TKI yaitu tahap
                            pendaftaran.<br>
                            pada tahap ini TKI beserta Petugas Penyalur harus mendatangi APJATI untuk melakukan
                            pendaftaran
                            kepada Operator.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">2. Medical Checkup</h5>
                        <p class="card-text">Tahap Selanjutnya yaitu, Medical Ceheckup yang dimana selesai TKI melakukan
                            pendaftaran maka TKI harus melakukan <br> pemeriksaan kesehatan ke klinik terdekat yang
                            sudah bekerja sama
                            dengan
                            APJATI.</p>
                </div>
            </div>
        </div>
    </div><br>

    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">3. BLK</h5>
                        <p class="card-text">Tahap Pertama yang dikakukan pada perekrutan TKI yaitu tahap pendaftaran.
                        </p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">4. Pemberangkatan</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>
    </div><br>

    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">5. Validasi Data</h5>
                        <p class="card-text">Tahap Pertama yang dikakukan pada perekrutan TKI yaitu tahap pendaftaran.
                        </p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">6. Halaman P3MI</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
