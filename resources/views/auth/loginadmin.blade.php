<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        .website-name {
            height: 200px;
            text-align: center;
            padding: 25px;
            background-image: url('assets/img/header-bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
            background-position: center;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="website-name">
            <h3>Sistem Pakar Diagnosa Penyakit Kista</h3>
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
    <p class="login-box-msg">Admin Masuk Disini</p>

    {!! Form::open(['id' => 'form','route' => 'login.admin.process']) !!}
        <div class="form-group">
            <input name="email" type="text" class="form-control" placeholder="Masukan email anda">
        </div>
        <div class="form-group mg-b-50">
            <input name="password" type="password" class="form-control" placeholder="Masukan Password Anda">
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-signin">Masuk</button>
    {!! Form::close() !!}
    <br>
    <a href="{{ route('login') }}" class="text-center">Pengguna Biasa Masuk Disini</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script src="{{ asset('awkawrd/js/jquery.min.js') }}"></script>
<script src="{{ asset('awkawrd/js/bootstrap.min.js') }}"></script>
</body>
</html>