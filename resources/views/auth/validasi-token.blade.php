@extends('layouts.home')


@section('content')

    <body class="hold-transition login-page">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-success">
                <div class="card-body">
                    <p class="login-box-msg">Masukan Kata Sandi Baru Anda</p>
                    <form action="/proses-validasi-forgot-password" method="post">
                        @csrf
                        <input type="hidden" name= "token" value="{{ $token }}">
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Kata Sandi" autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        @error('password')
                            <small class="text text-danger"> {{ $message }}</small>
                        @enderror
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                        <!-- /.col -->
                    </form>
                </div>
            </div>
        </div>
    </body>
@endsection
