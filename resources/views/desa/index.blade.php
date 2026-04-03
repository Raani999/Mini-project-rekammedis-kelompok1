<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekam Medis - Kelola Data Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; }
        .card { border: none; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        .card-header { background-color: #007bff; color: white; border-radius: 15px 15px 0 0 !important; font-weight: bold; }
        .form-check-input:checked { background-color: #007bff; border-color: #007bff; }
        .table thead { background-color: #e9ecef; }
    </style>
</head>
<body>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-9">

            <div class="card mb-4">
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

                    <form action="{{ route('desa.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nama" class="form-label fw-bold">Nama Pasien</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama lengkap" required>
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
                            <label for="desa_id" class="form-label fw-bold">Domisili Desa</label>
                            <select class="form-select" name="desa_id" id="desa_id" required>
                                <option value="" selected disabled>-- Pilih Desa/Kelurahan --</option>
                                @foreach($dataDesa as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_desa }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-center gap-2">
                            <button type="submit" class="btn btn-primary px-5 py-2 shadow-sm rounded-pill">Simpan Data Pasien</button>
                            <button type="reset" class="btn btn-outline-secondary px-5 py-2 rounded-pill">Batal</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header p-3 text-center">Daftar Pasien Terdaftar</div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="ps-4">Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th class="pe-4">Desa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dataPasien as $pasien)
                                    <tr>
                                        <td class="ps-4">{{ $pasien->nama }}</td>
                                        <td>{{ $pasien->jenisKelamin->deskripsi }}</td>
                                        <td class="pe-4">{{ $pasien->desa->nama_desa ?? 'Tidak ada data' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4 text-muted">Belum ada data pasien.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
