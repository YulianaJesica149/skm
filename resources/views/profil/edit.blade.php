@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mb-3 "></div>
        </div>
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">UBAH KATA SANDI</h3>
                </div>
                <div class="card-body">
                    <form action="/update-password/{{ auth()->user()->id }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="current_password">Kata Sandi Saat Ini</label>
                            <input type="password" class="form-control" id="current_password" name="current_password">
                            @error('current_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            {!! session('gagal') !!}
                        </div>
                        <div class="form-group">
                            <label for="new_password">Kata Sandi Baru</label>
                            <input type="password" class="form-control" id="new_password" name="new_password">
                            @error('new_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="new_password_confirmation">Konfirmasi Kata Sandi Baru</label>
                            <input type="password" class="form-control" id="new_password_confirmation"
                                name="new_password_confirmation">
                            @error('new_password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary ">Simpan</button>
                            <a href="/profil" class="btn btn-primary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
