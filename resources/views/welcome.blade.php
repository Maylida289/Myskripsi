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
        }

        .login-link:hover {
            background-color: #0056b3;
        }
    </style>

</head>

<body>

    <a href="{{ url('/login') }}" class="login-link">Login</a>

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
    </div>
</body>

</html>
