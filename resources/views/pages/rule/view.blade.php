@extends('layouts.master')
@section('breadcrumbs')
<ol class="breadcrumb slim-breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"></li>
</ol>
@endsection
@section('page_title','Ketentuan Sifat Tanah')
@section('content')
    @if (session()->has('danger'))
        <div class="alert alert-danger">
            <strong>Error!</strong>
            {{ session()->get('danger') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success">
            <strong>Success!</strong>
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="container">
        <div class="section-wrapper">
            <label class="section-title">Aturan Ketentuan Penyakit Berdasarkan Gejala</label>
            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label">Nama Penyakit </label>
                        <h4>{{ $data->name }}</h4>
                        </div>
                    </div>
                </div>
    
                <p class="mg-b-20 mg-sm-b-40">Kriteria berdasarkan gejala</p>
                <div class="row mg-b-25">
                @foreach($data->rules as $rule)
                    <div class="col-md-3">
                        <span>{{ $rule->cause->name }}</span>
                    </div>
                @endforeach
                </div>
    
                <div class="form-layout-footer">
                    <a href="{{ route('rule.index') }}" class="btn btn-default bd-0">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
