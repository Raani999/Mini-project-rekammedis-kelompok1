@extends('layouts.app')

@section('content')

<style>
    /* GLOBAL STYLE & FONT */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    body {
        background-color: #f0f6fc;
        font-family: 'Poppins', sans-serif;
        color: #2c3e50;
    }

    /* PENYEGARAN CARD */
    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0, 123, 255, 0.08);
        margin-bottom: 25px;
        transition: all 0.3s ease;
    }
    .card:hover { transform: translateY(-3px); box-shadow: 0 10px 25px rgba(0, 123, 255, 0.12); }

    /* HEADER BIRU PROFESIONAL */
    .card-header {
        background: linear-gradient(135deg, #0d47a1 0%, #1976d2 100%);
        color: white !important;
        border-radius: 12px 12px 0 0 !important;
        font-weight: 600;
        font-size: 1.2rem;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* FORM STYLING */
    .form-label { color: #1a237e; font-weight: 500; }
    .form-control, .form-select {
        border-radius: 8px;
        border: 1px solid #ced4da;
        padding: 12px 15px;
    }
    .form-control:focus, .form-select:focus {
        border-color: #0d47a1;
        box-shadow: 0 0 0 0.2rem rgba(13, 71, 161, 0.25);
    }

    /* CUSTOM RADIO BUTTONS (DOKTER STYLE) */
    .btn-check:checked + .btn-outline-primary {
        background-color: #1976d2;
        color: white;
    }
    .btn-group-custom .btn { border-radius: 8px; }

    /* BUTTONS */
    .btn-primary {
        background-color: #1976d2;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        padding: 12px;
        transition: all 0.3s ease;
    }
    .btn-primary:hover { background-color: #0d47a1; transform: scale(1.02); }

    /* TABEL PROFESIONAL */
    .table-responsive { border-radius: 10px; overflow: hidden; border: 1px solid #e3f2fd; }
    .table { margin-bottom: 0; background-color: white; }
    .table thead th {
        background-color: #e3f2fd;
        color: #0d47a1;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 1px;
        border-bottom: 2px solid #0d47a1;
        padding: 15px;
    }
    .table tbody td { padding: 15px; vertical-align: middle; border-color: #f1f8e9; }
    .table-hover tbody tr:hover { background-color: #e3f2fd; }

    .badge { font-size: 0.8rem; padding: 8px 12px; }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-11">

            <div class="card mb-5">
                <div class="card-header p-3 text-center">
                    <i class="fas fa-user-plus me-2"></i> Pendaftaran Pasien Baru
                </div>
                <div class="card-body p-4 p-lg-5">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Alhamdulillah!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('pasien.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nama" class="form-label">Nama Lengkap Pasien</label>
                            <input type="text" class="form-control" name="nama" id="nama"
                        </div>

                        <div class="mb-4">
                            <label class="form-label d-block">Jenis Kelamin</label>
                            <div class="btn-group w-100 btn-group-custom" role="group">
                                <input type="radio" class="btn-check" name="jenis_kelamin" id="lk" value="Laki-laki" required autocomplete="off">
                                <label class="btn btn-outline-primary w-50 py-3" for="lk"><i class="fas fa-male me-1"></i> Laki-laki</label>

                                <input type="radio" class="btn-check" name="jenis_kelamin" id="pr" value="Perempuan" autocomplete="off">
                                <label class="btn btn-outline-primary w-50 py-3" for="pr"><i class="fas fa-female me-1"></i> Perempuan</label>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="desa" class="form-label">Desa/Kelurahan</label>
                            <select class="form-select" name="desa_id" id="desa" required>
                                <option value="" selected disabled>-- Pilih Domisili --</option>
                                @foreach($dataDesa as $desa)
                                    <option value="{{ $desa->id }}">{{ $desa->nama_desa }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg text-white">
                                <i class="fas fa-save me-2"></i> Simpan Pendaftaran Pasien
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header p-3 text-center">
                    <i class="fas fa-list-alt me-2"></i> Dashboard Pendaftaran Pasien
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#ID</th>
                                    <th>Nama Pasien</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Domisili Desa</th>
                                    <th class="text-center" style="width: 15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dataPasien as $pasien)
                                    <tr>
                                    <td class="text-muted fw-bold">{{ $loop->iteration }}</td>
                                        <td class="fw-medium text-primary">{{ $pasien->nama }}</td>
                                        <td>
                                            @if($pasien->jenisKelamin->deskripsi == 'Laki-laki')
                                                <span class="badge bg-primary rounded-pill"><i class="fas fa-male me-1"></i> Laki-laki</span>
                                            @else
                                                <span class="badge bg-danger rounded-pill"><i class="fas fa-female me-1"></i> Perempuan</span>
                                            @endif
                                        </td>
                                        <td>{{ $pasien->desa->nama_desa }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" onsubmit="return confirm('Yakin ingin membatalkan pendaftaran pasien ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                                    <i class="fas fa-trash-alt me-1"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-5 text-muted">
                                            <i class="fas fa-user-slash fa-3x mb-3 d-block text-secondary"></i>
                                            Belum ada data pasien yang terdaftar.
                                        </td>
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

@endsection
