@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="col-sm-6">
                    <h3 class="m-0">Dashboard</h3>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <html>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


        <style>
            .chart-content {
                width: "50px";
                height: "50px"
            }
        </style>

        <body>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h5>Total Responden</h5>
                                    <p class="card-text text-center">{{ $totalRespondent }} Orang </p>
                                </div>
                                <div class="icon">
                                    <i class="ion bi bi-people-fill"></i>
                                </div>
                                <a href="/respondent" class="small-box-footer">Detail <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Main row -->
                    <div class="row g-2">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-chart-pie mr-1"></i>
                                        Responden Berdasarkan Jenis Kelamin
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="chart tab-pane active" id="JK-Chart"
                                        style="position: relative; height: 300px;">
                                        <canvas id="jkChart" height="300" style="height: 300px;"></canvas>
                                    </div>
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-chart-pie mr-1"></i>
                                        Responden Berdasarkan Usia/Umur
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="chart tab-pane active" id="Umur-Chart"
                                        style="position: relative; height: 300px;">
                                        <canvas id="UmurChart" height="300" style="height: 300px;"></canvas>
                                    </div>
                                </div><!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <!-- /.card -->
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-chart-pie mr-1"></i>
                                        Responden Berdasarkan Pendidikan
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="chart tab-pane active" id="Pendidikan-Chart"
                                        style="position: relative; height: 300px;">
                                        <canvas id="PendidikanChart" height="300" style="height: 300px;"></canvas>
                                    </div>
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.card -->
                        <div class="col-sm-6 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-chart-pie mr-1"></i>
                                        Responden Berdasarkan Pekerjaan
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="chart tab-pane active" id="Pekerjaan-Chart"
                                        style="position: relative; height: 300px;">
                                        <canvas id="PekerjaanChart" height="300" style="height: 300px;"></canvas>
                                    </div>
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <script>
                        const ctx = document.getElementById('jkChart');

                        new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: ['Laki-laki', 'Perempuan'],
                                datasets: [{
                                    label: 'Jenis Kelamin Respondent',
                                    data: [{{ $laki }}, {{ $perempuan }}],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {}
                            }
                        });
                    </script>
                    <script>
                        const umur = document.getElementById('UmurChart');

                        new Chart(umur, {
                            type: 'pie',
                            data: {
                                labels: ['<20 th', '20-29 th', '30-39 th', '40-49 th', '>50 th'],
                                datasets: [{
                                    label: 'Umur Respondent',
                                    data: [{{ $umur }}, {{ $umur2 }}, {{ $umur3 }},
                                        {{ $umur4 }}, {{ $umur5 }}
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {}
                            }
                        });
                    </script>
                    <script>
                        const pendidikan = document.getElementById('PendidikanChart');

                        new Chart(pendidikan, {
                            type: 'pie',
                            data: {
                                labels: ['SD', 'SMP', 'SLTA/SEDERAJAT', 'DI/DII', 'DIII', 'S1', 'S2', 'S3'],
                                datasets: [{
                                    label: 'pendidikan Respondent',
                                    data: [{{ $pendidikanSd }}, {{ $pendidikanSmp }}, {{ $pendidikanSma }},
                                        {{ $pendidikanD1 }}, {{ $pendidikanD3 }}, {{ $pendidikanS1 }},
                                        {{ $pendidikanS2 }}, {{ $pendidikanS3 }}
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {}
                            }
                        });
                    </script>
                    <script>
                        const pekerjaan = document.getElementById('PekerjaanChart');

                        new Chart(pekerjaan, {
                            type: 'pie',
                            data: {
                                labels: ['PNS/TNI/POLRI', 'Pegawai Swasta', 'Wiraswasta', 'Tenaga Medis', 'Pelajar/Mahasiswa',
                                    'Lainnya'
                                ],
                                datasets: [{
                                    label: 'pekerjaan Respondent',
                                    data: [{{ $pekerjaanPns }}, {{ $pekerjaanPs }}, {{ $pekerjaanWs }},
                                        {{ $pekerjaanTn }}, {{ $pekerjaanPM }}, {{ $pekerjaanLain }}
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {}
                            }
                        });
                    </script>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
    </div>
    <!-- /.content -->
    </body>

    </html>
@endsection
