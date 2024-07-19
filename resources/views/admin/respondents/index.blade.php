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
                        Data Responden
                    </h6>
                    <div class="ml-auto">
                        <a href="/respondent-export" class="btn btn-success">
                            <span class="icon"> <i class="bi bi-printer"></i></span>
                            <span class="text">Cetak</span>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class= "table-responsive">
                        @include('admin.respondents.table')
                    </div>
                </div>

                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
