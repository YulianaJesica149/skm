@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-6"></div>
            </div>
            <div class="card">
                <div class="card-header py-3 d-flex">
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Hasil Survei</h6>
                </div>

                @if (Session::has('status'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover datatable datatable-result"
                            cellspacing="0" width="100%" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Responden</th>
                                    <th>Jenis Pelayanan</th>
                                    <th>Pertanyaan</th>
                                    <th>Pilihan</th>
                                    <th>Saran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($results as $result)
                                    <tr data-entry-id="{{ $result->id }}">

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $result->respondents->id }}</td>
                                        <td>{{ $result->service->id }}</td>
                                        <td>{{ $result->question->id }}</td>
                                        <td>{{ $result->option->id }}</td>
                                        <td>{{ $result->saran }}</td>
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
    </div>
@endsection
