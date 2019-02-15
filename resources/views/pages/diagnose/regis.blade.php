@extends('layouts.master')
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
        <div class="row">
            <div class="col-md-12">
                @component('components.box')
                    @slot('title' ,'Silakan Isi Informasi Data Diri')
                    @slot('link')
                        <a target="_blank" href="{{ route('diagnose.index') }}" class="btn btn-default pull-right">Cancel</a>
                    @endslot
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Nama Lengkap: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="name" value="{{ Auth::user()->name }}" placeholder="Enter firstname">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Email : <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="email" value="{{ Auth::user()->email }}" placeholder="Enter lastname">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Alamat: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="address" value="{{ Auth::user()->address }}" placeholder="Enter address">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Jenis Kelamin: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="gender" value="{{ Auth::user()->gender == 'L' ? 'Laki Laki' : 'Perempuan' }}" placeholder="Enter address">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('diagnose.new') }}" class="btn btn-primary pull-right" style="float:right;">Lanjutkan</a>
                        </div>
                    </div>
                @endcomponent
            </div>
        </div>
    </div>

@endsection
