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
<div class="login-box">
  <div class="login-logo">
    <a href="#">Sistem Pakar Diagnosa Penyakit</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Masuk untuk mulai</p>

    {!! Form::open(['id' => 'form','route' => 'login.user']) !!}
        <div class="form-group">
            <input name="email" type="text" class="form-control" placeholder="Masukan email anda">
        </div>
        <div class="form-group mg-b-50">
            <input name="password" type="password" class="form-control" placeholder="Masukan Password Anda">
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-signin">Masuk</button>
    {!! Form::close() !!}
    <br>
    <a href="{{ route('register.view') }}" class="text-center">Daftarkan Akun</a>
    <br>
    <a href="{{ route('login.admin.view') }}" class="text-center">Admin Masuk Disini</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script src="{{ asset('awkawrd/js/jquery.min.js') }}"></script>
<script src="{{ asset('awkawrd/js/bootstrap.min.js') }}"></script>
</body>
</html>

