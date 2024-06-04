@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    {{-- <h3 class="m-0">Manajemen User</h3> --}}
                </div><!-- /.col -->
            </div>
            <!-- Content Row -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header py-3 d-flex">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Tambah Data User
                    </h6>
                    <div class="ml-auto">
                        <a href="/respondent"class="btn btn-primary btn-sm shadow-sm">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/respondent" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="umur" class="form-label">Umur</label>
                            <input type="text" id ="umur" name= "umur" placeholder="Umur(thn)"
                                class="form-control @error('umur') is-invalid @enderror" autofocus>
                            @error('umur')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <div class="input-group @error('jenis_kelamin') is-invalid @enderror">
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option selected>Jenis Kelamin</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                </select>
                                @error('jenis_kelamin')
                                    <small class="text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Pendidikan</label>
                            <div class="input-group  @error('pendidikan') is-invalid @enderror">
                                <select class="form-select" id="pendidikan" name="pendidikan" required>
                                    <option selected>Pilih Pendidikan</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
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
                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <div class="input-group  @error('pekerjaan') is-invalid @enderror">
                                <select class="form-select" id="pekerjaan" name="pekerjaan" required>
                                    <option selected>Pilih Pekerjaan</option>
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
                        <button type="submit" class="btn btn-primary btn mt-3">Simpan</button>
                    </form>
                </div>
            </div>
            <!-- Content Row -->
        </div>
    </div>
@endsection
