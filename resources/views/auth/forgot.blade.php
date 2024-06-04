@extends('layouts.home')


@section('content')

    <body class="hold-transition login-page">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-success">
                <div class="card-header text-center">
                    <a href="/login" class="h3"><b>Forget Password</b></a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Masukan Email Yang Sudah Terdaftar </p>
                    <form action="/proses-forgot-password" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" name= "email" class="form-control" placeholder="Email" autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        @error('email')
                            <small class="text text-danger"> {{ $message }}</small>
                        @enderror
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
@endsection
