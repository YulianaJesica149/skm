@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
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
                            Pilihan
                        </h6>
                        @if (auth()->user()->hasRole('admin') || auth()->user()->can('create_option'))
                            <div class="ml-auto">
                                <a href="/option-add" class="btn btn-primary">
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
                            <table class="table table-bordered table-striped table-hover datatable datatable-option"
                                cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pertanyaan</th>
                                        <th>Pilihan</th>
                                        <th>Poin</th>
                                        @if (auth()->user()->hasRole('admin'))
                                            <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($options as $option)
                                        <tr data-entry-id="{{ $option->id }}">

                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $option->question->question_text }}</td>
                                            <td>{{ $option->option_text }}</td>
                                            <td>{{ $option->points }}</td>
                                            @if (auth()->user()->hasRole('admin') ||
                                                    auth()->user()->can('edit_option' || 'delete_option'))
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="/option-edit/{{ $option->id }}" class="btn btn-info">
                                                            <i class="fa fa-pencil-alt"></i>
                                                        </a>
                                                        <form onclick="return confirm('Yakin mau menghapus ? ')"
                                                            class="d-inline" action="/option-destroy/{{ $option->id }}"
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
                                            <td colspan="7" class="text-center">{{ __('Data Empty') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Content Row -->

            </div>
        </div>
    </div>
@endsection
