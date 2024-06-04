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
                        Tambah Pilihan
                    </h6>
                    <div class="ml-auto">
                        <a href="/option"class="btn btn-primary btn-sm shadow-sm">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    {{-- <form action="{{ route('option.store') }}" method="POST"> --}}
                    <form action="/option" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="question">Pertanyaan</label>
                            <select class="form-select" id="floatingSelectGrid" name="question_id" id="question">
                                <option selected>Pilih Pertanyaan</option>
                                @foreach ($questions as $id => $question)
                                    <option value="{{ $id }}">{{ $question }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="option_text" class="form-label">Pilihan</label>
                            <input type="text" class="form-control @error('option_text') is-invalid @enderror"
                                id="option_text" name="option_text">
                        </div>
                        @error('option_text')
                            <small class="text text-danger">{{ $message }}</small>
                        @enderror
                        <div class="form-group">
                            <label for="points">Poin</label>
                            <input type="number" class="form-control @error('points') is-invalid @enderror" min= "1"
                                max="4" id="points" name="points" name="points" />
                        </div>
                        @error('points')
                            <small class="text text-danger">{{ $message }}</small>
                        @enderror
                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                    </form>
                </div>
            </div>
            <!-- Content Row -->
        </div>
    </div>
@endsection
