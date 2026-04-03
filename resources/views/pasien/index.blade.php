@extends('layouts.app')

@section('content')

<style>
    /* Kita simpan style khusus kamu di sini agar tetap cantik */
    body { background-color: #f0f2f5; }
    .card { border: none; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
    .card-header { background-color: #007bff; color: white; border-radius: 15px 15px 0 0 !important; font-weight: bold; }
    .form-check-input:checked { background-color: #007bff; border-color: #007bff; }
</style>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header p-3 text-center">
                    Tambah Data Pasien
                </div>
                <div class="card-body p-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('pasien.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="nama" class="form-label fw-bold">Nama Pasien</label>
                            <input type="text" class="form-control" name="nama" id="nama" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Jenis Kelamin</label>
                            <div class="d-flex gap-4 border p-3 rounded bg-light">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="lk" value="Laki-laki" required>
                                    <label class="form-check-label" for="lk">Laki-laki</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="pr" value="Perempuan">
                                    <label class="form-check-label" for="pr">Perempuan</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="desa" class="form-label fw-bold">Domisili Desa</label>
                            <select class="form-select" name="desa_id" id="desa" required>
                                <option value="" selected disabled>-- Pilih Desa/Kelurahan --</option>
                                @foreach($dataDesa as $desa)
                                    <option value="{{ $desa->id }}">{{ $desa->nama_desa }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header p-3 text-center">
                    Daftar Pasien
                </div>
                <div class="card-body p-4">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Desa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dataPasien as $pasien)
                                <tr>
                                    <td>{{ $pasien->nama }}</td>
                                    <td>{{ $pasien->jenisKelamin->deskripsi }}</td>
                                    <td>{{ $pasien->desa->nama_desa }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Belum ada data pasien.</td>
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
