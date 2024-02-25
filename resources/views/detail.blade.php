<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Buku</title>

    <!-- Tambahkan link CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">

    <h1 class="mt-4">Detail Buku</h1>

    <div>
        <a href="{{ route('home') }}" class="btn btn-primary">Kembali</a>
    </div>

    <div class="mt-4">
        <div class="row justify-content-between">
            <div class="col-md-4">
                <img src="{{ asset('storage/cover/' . $book->cover) }}" alt="{{ $book->judul }} Cover" class="img-fluid">
            </div>
            <div class="col-md-8">
                <p class="lead">Informasi Buku:</p>
                <ul class="list-group">
                    <li class="list-group-item">Judul: {{ $book->judul }}</li>
                    <li class="list-group-item">Penulis: {{ $book->penulis }}</li>
                    <li class="list-group-item">Penerbit: {{ $book->penerbit }}</li>
                    <li class="list-group-item">Tahun Terbit: {{ $book->tahun }}</li>
                    <li class="list-group-item">Deskripsi: {{ $book->deskripsi }}</li>
                </ul>

                <!-- Tambahkan button peminjaman dengan kondisi -->
                @auth
                    <a href="{{ route('peminjaman.create', ['id' => $book->id]) }}" class="btn btn-success mt-3">Pinjam Buku</a>
                @else
                    <button class="btn btn-secondary mt-3" disabled>Pinjam (Login Diperlukan)</button>
                @endauth
            </div>
        </div>
    </div>

    <!-- Tambahkan script JS Bootstrap jika diperlukan -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
