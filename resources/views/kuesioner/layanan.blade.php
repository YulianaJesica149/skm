<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Survei Kepuasan Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-success">
        <div class="container">
            <a class="navbar-brand fw-bold " href="/">
                <img src="img/LogoDinkes.png" alt="" width="25" height="25"
                    class="d-inline-block align-text-top">
                SURVEI KEPUASAN MASYARAKAT
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Kembali</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header text-center">
                SURVEI KEPUASAN MASYARAKAT
            </div>
            <div class="card-body">
                <div class="card-body">
                    {{-- <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="service" class="form-label">Jenis Layanan</label>
                            <div class="input-group @error('layanan') is-invalid @enderror">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bi bi-mortarboard-fill"></i></span>
                                </div>
                                <select class="form-select" id="service" name="service" required>
                                    <option selected=""> ------ Pilih Jenis Layanan ------ </option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->service_text }}</option>
                                    @endforeach
                                </select>
                                @error('layanan')
                                    <small class="text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!-- /.form group -->
                        </div>
                    </form> --}}
                    {{-- @foreach ($services as $service) --}}
                    {{-- <div class="text-base"><a href="/kuesioner/{{ $service->id }}">
                                {{ $service->service_id }}{{ $service->service_text }}</a>
                        </div> --}}
                    @foreach ($service->questions as $question)
                        <p>{{ $question->option }}</p>
                    @endforeach
                </div>
</body>

</html>
