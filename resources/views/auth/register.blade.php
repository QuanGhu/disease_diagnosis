<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Pakar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('awkawrd/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('awkawrd/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('awkawrd/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('awkawrd/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
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
<div class="login-box">
  <div class="login-logo">
    <a href="#">Sistem Pakar Diagnosa Penyakit</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Daftarkan akun anda</p>
    {!! Form::open(['id' => 'form','route' => 'register']) !!}
        <div class="form-group">
            <input name="name" type="text" class="form-control" placeholder="Masukan nama lengkap anda">
        </div>
        <div class="form-group">
            <input name="username" type="text" class="form-control" placeholder="Masukan nama pengguna anda">
        </div>
        <div class="form-group">
            <input name="email" type="email" class="form-control" placeholder="Masukan email anda">
        </div>
        <div class="form-group">
            <input name="password" type="password" class="form-control" placeholder="Masukan password anda">
        </div>
        <div class="form-group">
            {!! Form::select('gender', ['L' => 'Laki Laki', 'P' => 'Perempuan'], null, 
                ['placeholder' => 'Pilih Jenis Kelamin','class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <textarea name="address" placeholder="Masukan alamat anda" class="form-control"></textarea>
        </div>
    
        <button type="submit" class="btn btn-primary btn-block btn-signin">Daftar</button>
    {!! Form::close() !!}
    <br>
    <a href="{{ route('login') }}" class="text-center">Masuk disini jika sudah punya akun</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script src="{{ asset('awkawrd/js/jquery.min.js') }}"></script>
<script src="{{ asset('awkawrd/js/bootstrap.min.js') }}"></script>
</body>
</html>
