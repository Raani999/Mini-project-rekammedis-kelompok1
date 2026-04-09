<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekam Medis - Kelola Data Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .card { border: none; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); overflow: hidden; }
        .card-header { background-color: #007bff; color: white; font-weight: bold; border: none; }
        .form-label { color: #495057; }
        .form-control:focus, .form-select:focus { border-color: #007bff; box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25); }
        .btn-primary { background-color: #007bff; border: none; transition: all 0.3s; }
        .btn-primary:hover { background-color: #0056b3; transform: translateY(-1px); }
        .table thead { background-color: #f8f9fa; }
        /* Fix untuk dropdown agar tidak tumpuk */
        .form-select { cursor: pointer; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-9">

            <div class="card mb-5">
                <div class="card-header p-3 text-center">
                    <h5 class="mb-0 text-white">Tambah Data Pasien</h5>
                </div>
                <div class="card-body p-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('desa.store') }}" method="POST">
                        @csrf
                        </form>>

                        <div class="mb-4">
                            <label for="nama" class="form-label fw-bold">Nama Pasien</label>
                            <input type="text" class="form-control form-control-lg" name="nama" id="nama" placeholder="Masukkan nama lengkap" required>
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
                            <select class="form-select form-select-lg" name="desa_id" id="desa_id" required>
                                <option value="" selected disabled>-- Pilih Desa/Kelurahan --</option>
                                @foreach($dataDesa as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_desa }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-center gap-3 mt-5">
                            <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill shadow-sm">Simpan Data Pasien</button>
                            <button type="reset" class="btn btn-outline-secondary px-5 py-2 rounded-pill">Batal</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header p-3 text-center">
                    <h5 class="mb-0 text-white">Daftar Pasien Terdaftar</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4 py-3">Nama</th>
                                    <th class="py-3">Jenis Kelamin</th>
                                    <th class="pe-4 py-3">Desa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dataPasien as $pasien)
                                    <tr>
                                        <td class="ps-4 fw-medium">{{ $pasien->nama }}</td>
                                        <td>
                                            <span class="badge {{ $pasien->jenisKelamin->deskripsi == 'Laki-laki' ? 'bg-info text-dark' : 'bg-danger-subtle text-danger' }}">
                                                {{ $pasien->jenisKelamin->deskripsi }}
                                            </span>
                                        </td>
                                        <td class="pe-4 text-muted">{{ $pasien->desa->nama_desa ?? 'Tidak ada data' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-5 text-muted">
                                            <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" width="50" class="mb-3 opacity-25" alt=""><br>
                                            Belum ada data pasien yang tersimpan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
ss
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
