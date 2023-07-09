@extends('operator.main')

@section('title', 'Pendaftaran P3MI')
@section('breadcrumbs')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @php
            session()->flash('status');
        @endphp
    @endif

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
                            <a href="">Pendaftaran P3MI</a>
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
                        <strong>Pendaftaran P3MI</strong>
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
                            <form action="{{ url('pendaftaranp3mi') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label> Nama</label>
                                    <input type="text" name="nama" class="form-control" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label> Email</label>
                                    <input type="text" name="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" id="password" class="form-control" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-eye" id="togglePassword"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Sponsor</label>
                                    <input type="text" name="sponsor" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-success"> DAFTAR</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>


        </div>

    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#password');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>

@endsection
