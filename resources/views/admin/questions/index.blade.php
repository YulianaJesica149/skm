@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mb-2 "></div>
            <div class="card">
                <div class="card-header py-3 d-flex">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Pertanyaan
                    </h6>
                    @if (auth()->user()->hasRole('admin') || auth()->user()->can('create_question'))
                        <div class="ml-auto">
                            <a href="/question-add" class="btn btn-primary">
                                <span class="icon text-white-50">
                                    <i class="fa fa-plus"></i>
                                </span>
                                <span class="text">Tambah Data</span>
                            </a>
                        </div>
                    @endif
                </div>

                @if (Session::has('status'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover datatable datatable-category"
                            cellspacing="0" width="100%" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Pelayanan</th>
                                    <th>Pertanyaan</th>
                                    @if (auth()->user()->hasRole('admin'))
                                        <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($questions as $question)
                                    <tr data-entry-id="{{ $question->id }}">

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $question->service->service_text }}</td>
                                        <td>{{ $question->question_text }}</td>
                                        @if (auth()->user()->hasRole('admin') ||
                                                auth()->user()->can('edit_question' || 'delete_question'))
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <a href="question-edit/{{ $question->id }}" class="btn btn-info">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>
                                                    <form onclick="return confirm('Yakin mau menghapus ? ')"
                                                        class="d-inline" action="/question-destroy/{{ $question->id }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger"
                                                            style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">{{ __('Data Empty') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
