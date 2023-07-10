@extends('pemberangkatan.main')

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
