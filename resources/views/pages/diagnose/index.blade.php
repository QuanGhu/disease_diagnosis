@extends('layouts.master')
@section('breadcrumbs')
<ol class="breadcrumb slim-breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"></li>
</ol>
@endsection
@section('page_title','History Penilaian Tanah')
@section('content')
    <div class="container">
        <div class="row mg-t-10">
            <div class="col-md-6">
                <a target="_blank" href="#" class="btn btn-default">Cetak Tabel</a>
            </div>
            <div class="col-md-6">
                <a href="#" class="btn btn-primary pull-right">Buat Diagnosa Baru</a>
            </div>
            <div class="col-md-12">
                <h4>Riwayat Diagnosa Penyakit</h4>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Penilaian</th>
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
@endsection
@push('scripts')
<script src="{{ asset('theme/js/scripts.js') }}"></script>
<script>
    $( document ).ready(function() {

        
        
    });
</script>
@endpush
