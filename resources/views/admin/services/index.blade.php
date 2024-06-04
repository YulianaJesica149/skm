@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-6"></div>
            </div>
            <div class="card">
                <div class="card-header py-3 d-flex">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Jenis Pelayanan
                    </h6>
                    @if (auth()->user()->hasRole('admin') || auth()->user()->can('create_service'))
                        <div class="ml-auto mb-5">
                            <a href="/service-add" class="btn btn-primary">
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
                                    @if (auth()->user()->hasRole('admin'))
                                        <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($services as $service)
                                    <tr data-entry-id="{{ $service->id }}">

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $service->service_text }}</td>
                                        @if (auth()->user()->hasRole('admin') ||
                                                auth()->user()->can('edit_service' || 'delete_service'))
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <a href="/service-edit/{{ $service->id }}" class="btn btn-info">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>
                                                    <form onclick="return confirm('Yakin mau menghapus ? ')"
                                                        class="d-inline" action="/service-destroy/{{ $service->id }}"
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
        </div>
        <!-- Content Row -->
    </div>
@endsection
