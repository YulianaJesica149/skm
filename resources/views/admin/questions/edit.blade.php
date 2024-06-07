@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mb-2 "></div>
            <div class="card">
                <div class="card-header py-3 d-flex">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Ubah Pertanyaan
                    </h6>
                    <div class="ml-auto">
                        <a href="/question"class="btn btn-primary btn-sm shadow-sm">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/question-update/{{ $question->id }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="service_id">Jenis Pelayanan</label>
                            <div class="input-group" autofocus>
                                <select class="form-select" id="service_id" name="service_id">
                                    @foreach ($services as $id => $service)
                                        <option {{ $id == $question->service->id ? 'selected' : null }}
                                            value="{{ $id }}">{{ $service }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for= "question_text" class="form-label">Pertanyaan</label>
                            <input type="text" id="question_text" name="question_text"
                                class="form-control  @error('question_text') is-invalid @enderror"
                                value="{{ old('question_text', $question->question_text) }}">
                            @error('question_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
