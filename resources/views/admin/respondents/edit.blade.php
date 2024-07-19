@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mb-2 "></div>
            <div class="card">
                <div class="card-header py-3 d-flex">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Edit Data User
                    </h6>
                    <div class="ml-auto">
                        <a href="/respondent"class="btn btn-primary btn-sm shadow-sm">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/respondent-update/{{ $respondent->id }}" method="POST">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="mb-3">
                            <label for="umur" class="form-label">Umur</label>
                            <input type="text" id="umur" name="umur" autofocus
                                class="form-control  @error('umur') is-invalid @enderror"
                                value="{{ old('umur', $respondent->umur) }}">
                            @error('umur')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <div class="input-group @error('jenis_kelamin') is-invalid @enderror ">
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                    <option @if ($respondent->jenis_kelamin == 'Perempuan') selected @endif value="Perempuan">Perempuan
                                    </option>
                                    <option @if ($respondent->jenis_kelamin == 'Laki-laki') selected @endif value="Laki-laki">Laki-laki
                                    </option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Pendidikan</label>
                            <div class="input-group @error('pendidikan') is-invalid @enderror ">
                                <select class="form-select" id="floatingSelectGrid" name="pendidikan">
                                    <option @if ($respondent->pendidikan == 'SD') selected @endif value="SD">SD</option>
                                    <option @if ($respondent->pendidikan == 'SMP') selected @endif value="SMP">SMP
                                    </option>
                                    <option @if ($respondent->pendidikan == 'SLTA/SEDERAJAT') selected @endif value="SLTA/SEDERAJAT">
                                        SLTA/SEDERAJAT</option>
                                    <option @if ($respondent->pendidikan == 'DI/DII') selected @endif value="DI/DII">DI/DII
                                    </option>
                                    <option @if ($respondent->pendidikan == 'DIII') selected @endif value="DIII">DIII
                                    </option>
                                    <option @if ($respondent->pendidikan == 'S1') selected @endif value="S1">S1
                                    </option>
                                    <option @if ($respondent->pendidikan == 'S2') selected @endif value="S2">S2
                                    </option>
                                    <option @if ($respondent->pendidikan == 'S3') selected @endif value="S3">S3
                                    </option>
                                </select>

                                @error('pendidikan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <div class="input-group @error('pekerjaan') is-invalid @enderror ">
                                <select class="form-select" id="floatingSelectGrid" name="pekerjaan">
                                    <option @if ($respondent->pekerjaan == 'PNS/TNI/POLRI') selected @endif value="PNS/TNI/POLRI">
                                        PNS/TNI/POLRI</option>
                                    <option @if ($respondent->pekerjaan == 'SPegawai Swasta') selected @endif value="Pegawai Swasta">
                                        Pegawai Swasta</option>
                                    <option @if ($respondent->pekerjaan == 'Wiraswasta') selected @endif value="Wiraswasta">
                                        Wiraswasta</option>
                                    <option @if ($respondent->pekerjaan == 'Tenaga Medis') selected @endif value="Tenaga Medis">Tenaga
                                        Medis</option>
                                    <option @if ($respondent->pekerjaan == 'Pelajar/Mahasiswa') selected @endif value="Pelajar/Mahasiswa">
                                        Pelajar/Mahasiswa</option>
                                    <option @if ($respondent->pekerjaan == 'Lainnya') selected @endif value="Lainnya">Lainnya
                                    </option>
                                </select>
                                @error('pekerjaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-grid justify-content-md-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
