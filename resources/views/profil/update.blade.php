@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 "></div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">UBAH PROFIL</h3>
                            </div>
                            <form>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="name" class="form-control" id="name" placeholder="Nama"
                                            value="{{ old('name', auth()->user()->name) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email1">Email address</label>
                                        <input type="email" class="form-control" id="email1" name="email1"
                                            placeholder="Email" value="{{ old('email', auth()->user()->email) }}" required>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
