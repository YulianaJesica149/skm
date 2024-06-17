@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mb-2"></div>
            <div class="card">
                <div class="card-header py-3 d-flex">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Tambah Jenis Pelayanan
                    </h6>
                </div>
                <div class="card-body">
                    <form action="/service" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="service_text" class="form-label">Jenis Pelayanan</label>
                            <input type="text" id ="service_text" name= "service_text"
                                class="form-control @error('service_text') is-invalid @enderror" autofocus>
                            @error('service_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/service" class="btn btn-primary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Content Row -->
        </div>
    </div>
@endsection
