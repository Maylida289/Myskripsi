<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/scss/style.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>

    <style>
        .form-group {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            /* Untuk mengatur agar elemen berada di sebelah kiri (start) */
        }

        .form-group label {
            margin-bottom: 10px;
            /* Spasi antara label dan dropdown */
        }

        .form-group select {
            margin-bottom: 20px;
            width: 100%;
            /* Agar dropdown mengisi seluruh lebar container */
            max-width: 200px;
            /* Atur lebar maksimal dropdown jika diperlukan */
        }
    </style>

    <style>
        /* Style untuk container */
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Style untuk label */
        .container label {
            display: block;
            margin-bottom: 10px;
        }

        /* Style untuk select box */
        .container select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        /* Style untuk field dengan tampilan dropdown */
        .container .field-dropdown {
            position: relative;
            display: inline-block;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Style untuk tampilan opsi dropdown */
        .container .field-dropdown select {
            width: 100%;
            padding: 10px;
            background-color: transparent;
            border: none;
            font-size: 16px;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        /* Style untuk tampilan arrow dropdown */
        .container .field-dropdown::after {
            content: '\25BC';
            /* Unicode karakter untuk tanda panah bawah */
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
        }
    </style>
</head>


@php
    $displayedSponsors = [];
@endphp

<body class="bg-dark">

    <div style="display: flex; justify-content: center; align-items: center; height: 500vh; width: 50vh;">
        <div class="container" style="background-color: white; padding: 20px; border-radius: 10px;">
            <h4 style="text-align: center;">Login</h4>

            <!-- JavaScript untuk mendapatkan value dropdown yang dipilih -->
            <div class="login-content">
                <div class="login-form">
                    <form method="POST" id="loginForm">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" placeholder="Email" name="email"
                                id="emailInput">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password"
                                id="passwordInput">
                        </div>
                        <div class="form-group">
                            <label id="label-sponsor" style="cursor: pointer;">Login sebagai P3MI?</label>
                            <div id="sponsorDropdown" style="display: none;">
                                <select name="sponsor" id="sponsor">
                                    <option value="">Select P3MI</option>
                                    @foreach ($list_p3mi as $p3mi)
                                        @if ($p3mi->sponsor != null && !in_array($p3mi->sponsor, $displayedSponsors))
                                            <option value="{{ $p3mi->sponsor }}">{{ $p3mi->sponsor }}</option>
                                            @php
                                                $displayedSponsors[] = $p3mi->sponsor;
                                            @endphp
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div style="display: flex; justify-content: center; margin-bottom: 20px">
                            <!-- Tambahkan atribut disabled untuk menonaktifkan tombol secara default -->
                            <button type="submit" class="btn btn-success btn-flat" style="display: block; width: 100%;"
                                id="signInButton" disabled>Sign in</button>
                        </div>

                        <script>
                            const emailInput = document.getElementById('emailInput');
                            emailInput.addEventListener('input', function() {
                                const email = this.value;
                                const atIndex = email.indexOf('@');
                                const dotIndex = email.lastIndexOf('.');

                                if (atIndex >= 0 && dotIndex > atIndex) {
                                    const domain = email.substring(atIndex + 1, dotIndex);
                                    const actionURL = "{{ url('post-login-') }}" + domain;
                                    loginForm.action = actionURL;
                                    loginForm.method = "POST";
                                } else {
                                    // Jika email tidak sesuai syarat, pilih opsi default (kosong)
                                    userTypeDropdown.value = '';
                                }
                            });

                            const passwordInput = document.getElementById('passwordInput');
                            const signInButton = document.getElementById('signInButton');

                            // Fungsi untuk memeriksa nilai input email dan password, dan menonaktifkan tombol "Sign in" jika salah satu atau keduanya kosong
                            function checkInputValidity() {
                                const emailValue = emailInput.value.trim();
                                const passwordValue = passwordInput.value.trim();
                                // Jika email atau password kosong, nonaktifkan tombol "Sign in", jika tidak, aktifkan tombol "Sign in"
                                if (emailValue === '' || passwordValue === '') {
                                    signInButton.disabled = true;
                                } else {
                                    signInButton.disabled = false;
                                }
                            }

                            // Panggil fungsi checkInputValidity() saat halaman dimuat
                            checkInputValidity();

                            // Tambahkan event listener pada input email dan password untuk memantau perubahan nilai
                            emailInput.addEventListener('input', checkInputValidity);
                            passwordInput.addEventListener('input', checkInputValidity);

                            const labelSponsor = document.getElementById('label-sponsor');
                            const sponsorDropdown = document.getElementById('sponsorDropdown');

                            // Fungsi untuk menampilkan atau menyembunyikan dropdown Sponsor
                            function toggleSponsorDropdown() {
                                if (sponsorDropdown.style.display === 'none') {
                                    sponsorDropdown.style.display = 'block';
                                } else {
                                    sponsorDropdown.style.display = 'none';
                                }
                            }

                            // Tambahkan event listener pada teks "Login sebagai P3MI?" untuk memantau klik
                            labelSponsor.addEventListener('click', toggleSponsorDropdown);
                        </script>


                        @if (session('login-failed'))
                            <div class="alert alert-danger">
                                {{ session('login-failed') }}
                            </div>
                            @php
                                session()->flash('login-failed');
                            @endphp
                        @endif
                    </form>
                </div>

            </div>
        </div>
    </div>



    <script src="{{ asset('style/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('style/assets/js/main.js') }}"></script>
</body>


</html>
