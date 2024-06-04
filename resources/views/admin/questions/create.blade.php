@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    {{-- <h3 class="m-0">Manajemen User</h3> --}}
                </div><!-- /.col -->
            </div>
            <!-- Page Heading -->


            <!-- Content Row -->
            <div class="card">
                <div class="card-header py-3 d-flex">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Tambah Pertanyaan
                    </h6>
                    <div class="ml-auto">
                        <a href="/question"class="btn btn-primary btn-sm shadow-sm">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/question" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Jenis Pelayanan</label>
                            <div class="input-group">
                                <select class="form-select @error('service_id') is-invalid @enderror" autofocus
                                    id="service_id" name="service_id">
                                    @foreach ($services as $id => $service)
                                        <option value="{{ $id }}">{{ $service }}</option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="question" class="form-label">Pertanyaan</label>
                            <input type="text" id="question" name="question_text"
                                class="form-control  @error('question_text') is-invalid @enderror">
                            @error('question_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>

                </div>
            </div>
            <!-- Content Row -->
        </div>
    </div>
@endsection
