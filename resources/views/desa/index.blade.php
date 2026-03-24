<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekam Medis - Kelola Data Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; padding-top: 50px; }
        .card { border: none; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        .card-header { background-color: #007bff; color: white; border-radius: 15px 15px 0 0 !important; font-weight: bold; }
        .form-check-input:checked { background-color: #007bff; border-color: #007bff; }
    </style>
</head>
<body>

<div class="container">
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

                    <form action="{{ route('desa.store') }}" method="POST">
                        @csrf

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
                                <option value="1">Desa Sukamaju</option>
                                <option value="2">Desa Mekarsari</option>
                                <option value="3">Desa Bojonggede</option>
                                <option value="4">Desa Melati</option>
                            </select>
                            <div class="form-text mt-2">Pilih lokasi sesuai KTP pasien saat ini.</div>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-center gap-2">
                            <button type="submit" class="btn btn-primary px-5 py-2 shadow-sm rounded-pill">
                                Simpan Data Pasien
                            </button>
                            <button type="reset" class="btn btn-outline-secondary px-5 py-2 rounded-pill">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
