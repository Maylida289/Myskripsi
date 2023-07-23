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
                            <label id="label-sponsor">Sponsor</label>
                            <div style="margin-bottom: 50px;">
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
                        <select id="userTypeDropdown" style="margin-bottom: 20px;">
                            <option value="">Pilih tipe user</option>
                            <option value="operator">Operator</option>
                            <option value="admin">Admin</option>
                            <option value="medical-checkup">Medical Checkup</option>
                            <option value="blk">BLK</option>
                            <option value="pemberangkatan">Pemberangkatan</option>
                            <option value="p3mi">P3MI</option>
                        </select>

                        <div style="display: flex; justify-content: center; margin-bottom: 20px">
                            <!-- Tambahkan atribut disabled untuk menonaktifkan tombol secara default -->
                            <button type="submit" class="btn btn-success btn-flat" style="display: block; width: 100%;"
                                id="signInButton" disabled>Sign in</button>
                        </div>

                        <script>
                            const userTypeDropdown = document.getElementById('userTypeDropdown');
                            const sponsorInput = document.getElementById('sponsor');
                            const labelSponsor = document.getElementById('label-sponsor');
                            const emailInput = document.getElementById('emailInput');
                            const passwordInput = document.getElementById('passwordInput');
                            const signInButton = document.getElementById('signInButton');

                            // Fungsi untuk menampilkan atau menyembunyikan input field "Sponsor" berdasarkan nilai dropdown
                            function toggleSponsorInput() {
                                const selectedValue = userTypeDropdown.value;
                                // Jika nilai dropdown adalah "p3mi", maka tampilkan input field "Sponsor"
                                // Jika nilai dropdown bukan "p3mi", maka sembunyikan input field "Sponsor"
                                if (selectedValue === 'p3mi') {
                                    sponsorInput.style.display = 'block';
                                    labelSponsor.style.display = 'block';
                                } else {
                                    sponsorInput.style.display = 'none';
                                    labelSponsor.style.display = 'none';
                                }
                            }

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

                            // Panggil fungsi toggleSponsorInput() saat pertama kali halaman dimuat
                            toggleSponsorInput();

                            // Tambahkan event listener pada dropdown untuk memantau perubahan nilai dropdown
                            userTypeDropdown.addEventListener('change', function() {
                                toggleSponsorInput();
                                const selectedValue = this.value;
                                const actionURL = "{{ url('post-login-') }}" + selectedValue;
                                loginForm.action = actionURL;
                                loginForm.method = "POST";
                            });

                            // Tambahkan event listener pada input email dan password untuk memantau perubahan nilai
                            emailInput.addEventListener('input', checkInputValidity);
                            passwordInput.addEventListener('input', checkInputValidity);
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
