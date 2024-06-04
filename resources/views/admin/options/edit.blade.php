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
                        Ubah Pilihan
                    </h6>
                    <div class="ml-auto">
                        <a href="/option"class="btn btn-primary btn-sm shadow-sm">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/option-update/{{ $option->id }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="question">Pertanyaan</label>
                            <select class="form-select" id="floatingSelectGrid" name="question_id" id="question">
                                {{-- <option value="{{ $option->question->question_text }}">
                                    {{ $option->question->question_text }}</option>
                                @foreach ($question as $data)
                                    <option value="{{ $data->id }}">{{ $data->question_text }}</option>
                                @endforeach --}}
                                @foreach ($questions as $id => $question)
                                    <option {{ $id == $option->question->id ? 'selected' : null }}
                                        value="{{ $id }}">{{ $question }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="option_text" class="form-label">Pilihan</label>
                            <input type="text" class="form-control" id="option_text" name="option_text"
                                value="{{ old('option_text', $option->option_text) }} ">
                        </div>
                        <div class="form-group">
                            <label for="points">Poin</label>
                            <input type="number" class="form-control" id="points" min= "1" max="4"
                                name="points" value="{{ old('points', $option->points) }}">

                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                    </form>
                </div>
            </div>
            <!-- Content Row -->
        </div>
    </div>
@endsection
