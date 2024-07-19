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
                SKM DINKES KALTIM
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
                <form action="/respondent" method="POST">
                    @csrf
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="umur" class="form-label">Umur</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
                                    </div>
                                    <input type="text" id ="umur" name= "umur"
                                        class="form-control @error('umur') is-invalid @enderror" placeholder="Umur(thn)"
                                        autofocus required>
                                    @error('umur')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <div class="input-group @error('jenis_kelamin') is-invalid @enderror">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                                    </div>
                                    <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" required>
                                        <option selected> ------ Jenis Kelamin ------ </option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <small class="text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-group mt-3">
                                <label for="pendidikan" class="form-label">Pendidikan</label>
                                <div class="input-group  @error('pendidikan') is-invalid @enderror">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-mortarboard-fill"></i></span>
                                    </div>
                                    <select class="form-select" name="pendidikan" id="pendidikan" required>
                                        <option selected> ------ Pilih Pendidikan ------ </option>
                                        {{-- <option value="SD">SD</option>
                                        <option value="SMP">SMP</option> --}}
                                        <option value="SLTA/SEDERAJAT">SLTA/SEDERAJAT</option>
                                        <option value="DI/DII">DI/DII</option>
                                        <option value="DIII">DIII</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                    @error('pendidikan')
                                        <small class="text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group mt-3">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <div class="input-group @error('pekerjaan') is-invalid @enderror">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-person-workspace"></i></span>
                                    </div>
                                    <select class="form-select" name="pekerjaan" id="pekerjaan" required>
                                        <option selected> ------ Pilih Pekerjaan ------ </option>
                                        <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                                        <option value="Pegawai Swasta">Pegawai Swasta</option>
                                        <option value="Wiraswasta">Wiraswasta</option>
                                        <option value="Tenaga Medis">Tenaga Medis</option>
                                        <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    @error('pekerjaan')
                                        <small class="text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="service" class="form-label">Jenis Layanan</label>
                        <div class="input-group @error('layanan') is-invalid @enderror">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-person-gear"></i></span>
                            </div>
                            <select class="form-select" id="service" name="service" required>
                                <option value=""> ------ Pilih Jenis Layanan ------ </option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">
                                        {{ $service->service_text }}
                                @endforeach
                            </select>
                            @error('layanan')
                                <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                        <button class="btn btn-primary" type="submit" value="submit">Lanjutkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
