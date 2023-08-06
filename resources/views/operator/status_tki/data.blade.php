@extends('operator.main')

@section('title', 'List TKI')

<style>
    .progress-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .step {
        flex: 1;
        text-align: center;
        color: #000;
        /* Warna teks default */
    }

    .line {
        flex: 1;
        height: 3px;
        background-color: #ccc;
    }

    /* Merubah warna garis untuk langkah-langkah yang telah selesai */
    .step:nth-child(-n + 3)~.line {
        background-color: #39b54a;
        /* Ganti dengan warna sesuai desain Anda */
    }

    /* Menampilkan warna yang berbeda untuk langkah saat ini */
    .step:nth-child({{ $active }}) {
        color: #39b54a;
        /* Ganti dengan warna sesuai desain Anda */
        font-weight: bold;
    }

    .step.active {
        font-weight: bold;
        color: #39b54a;
        /* Warna teks saat aktif (di-tap) */
    }

    .step.active {
        font-weight: bold;
        color: #39b54a;
    }

    .step.active span {
        color: #39b54a;
    }
</style>
@section('breadcrumbs')
    @php
        $iteration = 1;
    @endphp

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>List TKI</h1>
                </div>
            </div>
        </div>

        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li>
                            <a href="#">List TKI</a>
                        </li>
                        <li class="active">List TKI</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <div class="progress-container" style="width: 1000px; margin:20px">
                    <a class="step" href="{{ url('status-tki-operator/medical') }}">Medical<br><span>1</span></a>
                    <div class="line"></div>
                    <a class="step" href="{{ url('status-tki-operator/blk') }}">BLK<br><span>2</span></a>
                    <div class="line"></div>
                    <a class="step" href="{{ url('status-tki-operator/validasi') }}">Waiting<br><span>3</span></a>
                    <div class="line"></div>
                    <a class="step" href="{{ url('status-tki-operator/hasil-validasi') }}">Approved<br><span>4</span></a>
                    <div class="line"></div>
                    <a class="step" href="{{ url('status-tki-operator/berangkat') }}">Berangkat<br><span>5</span></a>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const steps = document.querySelectorAll('.step');

            steps.forEach(function(step) {
                step.addEventListener('click', function() {
                    // Menghapus kelas "active" dari semua langkah
                    steps.forEach(function(s) {
                        s.classList.remove('active');
                    });

                    // Menambahkan kelas "active" ke langkah yang diklik
                    this.classList.add('active');
                });
            });
        });
    </script>

@endsection

@section('content')

    <div class="content mt-3">

        <div class="animated fadeIn">

            {{-- fungsi redirect tools --}}
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>List TKI</strong>
                    </div>

                </div>
                <div class="card -body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Sponsor</th>
                                <th>Monitoring</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($statusTki as $item)
                                <tr>
                                    <td class="text-center">{{ $iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->sponsor }}</td>
                                    <td>
                                        @if ($active === 9)
                                            Berangkat
                                        @elseif ($item->berangkat === 'true')
                                            Berangkat
                                        @elseif (isset($item->sertifikat_kesehatan) &&
                                                isset($item->sertifikat_blk) &&
                                                $item->hasil_validasi === 'Approved' &&
                                                !isset($item->berangkat))
                                            Approved
                                        @elseif (isset($item->sertifikat_kesehatan) && isset($item->sertifikat_blk))
                                            Waiting
                                        @elseif (isset($item->sertifikat_kesehatan))
                                            BLK
                                        @else
                                            Medical
                                        @endif

                                    </td>
                                </tr>
                                @php
                                    $iteration++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
