@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mb-3 "></div>
        </div>
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">PROFIL</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', auth()->user()->name) }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email', auth()->user()->email) }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password"
                                value="{{ old('password', auth()->user()->password) }}" readonly>
                            <a href= "/profil-change-password/{{ auth()->user()->id }}" class="btn btn-primary">
                                <span class="icon text-white-50">
                                    <i class="fa fa-pencil-alt"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
