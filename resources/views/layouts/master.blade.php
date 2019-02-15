<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Pakar</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('awkawrd/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('awkawrd/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('awkawrd/css/ionicons.min.css') }}">
  <link href="{{ asset('theme/css/jquery.toast.css') }}" rel="stylesheet">
  <link href="{{ asset('theme/css/sweetalert.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('awkawrd/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('awkawrd/css/_all-skins.min.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="#" class="logo">
      <span class="logo-mini"><b>A</b></span>
      <span class="logo-lg"><b>Admin</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    @include('layouts.navbar')
  </aside>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Sistem Pakar
      </h1>
    </section>

    <section class="content">
        @yield('content')
    </section>

  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
  </footer>
</div>

<script src="{{ asset('awkawrd/js/jquery.min.js') }}"></script>
<script src="{{ asset('awkawrd/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('theme/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('theme/js/jqBootstrapValidation.js') }}"></script>
<script src="{{ asset('theme/js/jquery.toast.js') }}"></script>
<script src="{{ asset('theme/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('theme/js/jquery.sweet-alert.custom.js') }}"></script>
<script src="{{ asset('awkawrd/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('awkawrd/js/fastclick.js') }}"></script>
<script src="{{ asset('awkawrd/js/adminlte.min.js') }}"></script>
<script src="{{ asset('awkawrd/js/demo.js') }}"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
@stack('scripts')
</body>
</html>
