@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 ">
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">PROFIL</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="name" class="form-control" id="name" placeholder="Nama"
                                                value="{{ old('name', auth()->user()->name) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                placeholder="Email" value="{{ old('email', auth()->user()->email) }}">
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="password">Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="password"
                                                    placeholder="Password"><a
                                                    href= "{{ route('profil.edit', auth()->user()->id) }}"
                                                    class="btn btn-info">
                                                    <span class="icon text-white-50">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </span>

                                                </a>
                                            </div>
                                        </div> --}}
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.content-header -->
                    @endsection
