<!doctype html>
<html lang="id">
<head>
    <!DOCTYPE html>
<html>
<head>
    <title>Data Jenis Kelamin</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #ddd;
        }
    </style>
</head>
<body>

<h2>Data Jenis Kelamin</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Jenis Kelamin</th>
    </tr>

    @foreach($data as $row)
    <tr>
        <td>{{ $row->id }}</td>
        <td>{{ $row->nama_jenis_kelamin }}</td>
    </tr>
    @endforeach

</table>

</body>
</html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jenis Kelamin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h1 class="mb-4">Data Jenis Kelamin</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <form method="POST" action="{{ route('jenis_kelamin.store') }}">
                @csrf
                <div class="row g-2">
                    <div class="col-md-8">
                        <input type="text" name="nama_jenis_kelamin" class="form-control" placeholder="Nama Jenis Kelamin" required>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary w-100" type="submit">Tambah Jenis</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Daftar Jenis Jembatan</h5>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Jenis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($jenisJembatans ?? [] as $jenis)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $jenis->nama_jenis_kelamin ?? '-' }}</td>
                            <td>
                                <form method="POST" action="{{ route('jenis_kelamin.destroy', $jenis->id ?? $jenis->uuid ?? $loop->index) }}" onsubmit="return confirm('Hapus jenis ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Belum ada data jenis jembatan.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ url('/') }}" class="btn btn-light">Kembali</a>
    </div>
</div>
</body>
</html>
