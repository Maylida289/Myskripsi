@extends('operator.main')

@section('title', 'List P3MI')
@section('breadcrumbs')



    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>List P3MI</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li>
                            <a href="#">List P3MI</a>
                        </li>
                        <li class="active">Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('content')

    <div class="content mt-3">

        <div class="animated fadeIn">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @php
                    session()->flash('status');
                @endphp
            @endif


            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>List TKI</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('pendaftaranp3mi/add') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus">Add</i>
                        </a>
                    </div>
                </div>
                <div class="card -body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Sponsor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listP3mi as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->sponsor }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>

    </div>

@endsection
