@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 ">
                    <div class="col-sm-6">
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-6">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">RESET PASSWORD BARU</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="{{ route('password.update', auth()->user()->id) }}" method="POST">
                                        @method('put')
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="oldPassword">Password Lama</label>
                                                <input type="password"
                                                    class="form-control @error('old_password') is-invalid @enderror"
                                                    name="old_password"id="old_password">
                                                @error('old_password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="newPassword">Password Baru</label>
                                                <input type="password"
                                                    class="form-control
                                                    @error('new_password') is-invalid @enderror"
                                                    name="new_password"id="new_password">
                                                @error('new_password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="passwordConfirmation">Konfirmasi Password</label>
                                                <input type="password"
                                                    class="form-control
                                                    @error('password_confirmation') is-invalid @enderror"
                                                    name="password_confirmation" id="password_confirmation">
                                                @error('password_confirmation')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Password</button>
                                </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.content-header -->
                    @endsection
