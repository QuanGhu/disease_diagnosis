@extends('layouts.master')
@section('breadcrumbs')
<ol class="breadcrumb slim-breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Sifat Tanah</li>
</ol>
@endsection
@section('page_title','Nama Penyakit')
@section('content')
    <div class="container">
        <div class="row mg-t-10">
            <div class="col-md-12">
                <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalForm">Tambah Data</a>
            </div>
            <div class="col-md-12">
                <h4>Data Nama Penyakit</h4>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Penyakit</th>
                                <th>Nama Penyakit</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('pages.disease.form')
@endsection
@push('scripts')
<script src="{{ asset('theme/js/scripts.js') }}"></script>

@endpush