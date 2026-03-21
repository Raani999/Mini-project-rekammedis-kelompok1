<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekam Medis - Kelola Data Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; padding-top: 50px; }
        .card { border-radius: 15px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .card-header { background-color: #007bff; color: white; border-radius: 15px 15px 0 0 !important; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Fitur Kelola Pasien (Desa & Jenis Kelamin)</h4>
                </div>
                <div class="card-body">

                    <form action="#" method="POST">
                        @csrf <div class="mb-4">
                            <label class="form-label fw-bold">Jenis Kelamin</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="Laki-laki" required>
                                    <label class="form-check-label" for="laki">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="mb-4">
                            <label for="desa" class="form-label fw-bold">Pilih Desa/Kelurahan</label>
                            <select class="form-select" name="desa_id" id="desa" required>
                                <option value="" selected disabled>-- Pilih Desa --</option>
                                <option value="1">Desa Sukamaju</option>
                                <option value="2">Desa Mekarsari</option>
                                <option value="3">Desa Bojonggede</option>
                                <option value="4">Desa Melati</option>
                            </select>
                            <div class="form-text">Pastikan memilih desa sesuai domisili pasien.</div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">Simpan Data Pasien</button>
                        </div>

                    </form>

                </div>
            </div>

            <p class="text-center mt-4 text-muted small">Semangat Rani! Deadline 10 April menanti 🚀</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
