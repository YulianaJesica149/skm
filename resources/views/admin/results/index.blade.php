@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mb-2 "></div>

            <div class="card">
                <div class="card-header py-3 d-flex">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Laporan Hasil Survei
                    </h6>
                    <div class="ml-auto">
                        <a href="/result-export" class="btn btn-primary">
                            <span class="icon text-white-50">
                                <i class="fa fa-plus"></i>
                            </span>
                            <span class="text">Export Data</span>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class= "table-responsive">
                        @include('admin.results.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
