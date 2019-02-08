<ul class="nav navbar-nav">
    <li><a href="{{ route('home') }}"><i class="fa fa-home" aria-hidden="true"></i> Beranda</a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user-md" aria-hidden="true"></i> Penyakit
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('disease.index') }}">Nama Penyakit</a></li>
            <li><a href="{{ route('cause.index') }}">Gejala</a></li>
            <li><a href="{{ route('solution.index') }}">Solusi</a></li>
            <li><a href="{{ route('rule.index') }}">Ketentuan</a></li>
        </ul>
    </li>
    <li><a href="{{ route('diagnose.index') }}"><i class="fa fa-search" aria-hidden="true"></i> Hasil Diagnosa Penyakit</a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user-md" aria-hidden="true"></i> Administrator
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('user.index') }}">List Pengguna</a></li>
            <li><a href="{{ route('level.index') }}">List Level Pengguna</a></li>
        </ul>
    </li>
</ul>