@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mb-2 "></div>
            <div class="card">
                <div class="card-header py-3 d-flex">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Tambah Pertanyaan
                    </h6>
                </div>
                <div class="card-body">
                    <form action="/question" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="service_id">Jenis Pelayanan</label>
                            <select class="form-select" name="service_id" id="service_id">
                                <option selected>Pilih Jenis Pelayanan </option>
                                @foreach ($services as $id => $service)
                                    <option value="{{ $id }}">{{ $service }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="question_text" class="form-label">Pertanyaan</label>
                            <input type="text" id="question_text" name="question_text"
                                class="form-control  @error('question_text') is-invalid @enderror">
                            @error('question_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/question"class="btn btn-primary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
