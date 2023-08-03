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
                            <form method="POST" action="{{ url('upload/store-pemberangkatan/' . $detail_tki->id) }}"
                                enctype="multipart/form-data">

                                @csrf

                                <div class="form-group">
                                    <label>Visa</label>
                                    <div class="card">
                                        <div class="card-header">{{ __('Upload File or Images') }}</div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="name"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('File') }}</label>
                                                <div class="col-md-6">
                                                    <input type="file" class="form-control" name="visa"
                                                        style="width: 200px;" required>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Paspor</label>
                                    <div class="card">
                                        <div class="card-header">{{ __('Upload File or Images') }}</div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="name"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('File') }}</label>
                                                <div class="col-md-6">
                                                    <input type="file" class="form-control" name="paspor"
                                                        style="width: 200px;" required>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">Upload Visa dan Paspor</button>
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
