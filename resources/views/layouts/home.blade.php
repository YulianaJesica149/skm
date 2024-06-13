@extends('layouts.main')

@section('content')
    <nav class="navbar navbar-expand-lg bg-success">
        <div class="container">
            <a class="navbar-brand fw-bold " href="/">
                <img src="img/LogoDinkes.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                SURVEI KEPUASAN MASYARAKAT
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="/login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container  mt-5">
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading fw-normal lh-1">Selamat Datang <span class="text-body-secondary"></span></h2>
                <p class="lead">Sistem SURVEI Kepuasan Masyarakat</p>
                <a class="btn btn-success btn-lg fw-bold" href="/questionnaire" role="button">Isi Survei Klik Di Sini!</a>
            </div>
            <div class="col-md-5">
                <img src="img/Gambarluar_1.jpg" class="rounded float-end" alt="" width="400">
            </div>
        </div>
    </div>
@endsection
