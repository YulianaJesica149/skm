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
        </div>
        <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    Laporan Hasil Survei
                </h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-result" cellspacing="0"
                        width="100%" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Responden</th>
                                <th>Jenis Pelayanan</th>
                                <th>Pertanyaan</th>
                                <th>Jawaban</th>
                                <th>Poin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($results as $result)
                                <tr data-entry-id="{{ $result->id }}">
                                    <td>

                                    </td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $result->respondents->id }}</td>
                                    <td>{{ $result->service->id }}</td>
                                    <td>{{ $result->question->id }}</td>
                                    <td>{{ $result->option_text }}</td>
                                    <td>{{ $result->option->poin }}</td>
                                    <td>
                                        @foreach ($result->questions as $key => $question)
                                            <span class="badge badge-info">{{ $question->question_text }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="" class="btn btn-success">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
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
        @endsection
