@extends('layouts.main')


@section('content')

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="card card-outline card-success">
                <div class="card-header text-center">
                    <h3><b>Selamat Datang</b></h3>
                </div>
                <div class="card-body">
                    <form action="/login" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" name= "email" id="email" autocomplete="off"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Email" autofocus
                                value="{{ old('email') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        @error('email')
                            <small class="text text-danger"> {{ $message }}</small>
                        @enderror
                        <div class="input-group mb-3">
                            <input type="password" name= "password" id="password"
                                class="form-control  @error('password') is-invalid @enderror" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        @error('password')
                            <small class="text text-danger"> {{ $message }}</small>
                        @enderror
                        {{-- <div class="col-6">
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="remember" name="remember">
                                        <label for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                                </div> --}}
                        <!-- /.col -->

                        <div class="col-12 mb-3">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </form>

                    <p class="mb-2">
                        <a href="{{ route('forgot-password') }}">I forgot my password</a>
                    </p>
                </div>
            </div>
        </div>
    </body>
@endsection
