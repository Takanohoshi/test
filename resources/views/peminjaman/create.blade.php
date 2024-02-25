<!-- resources/views/peminjaman/create.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peminjaman</title>
</head>

<body>
    <h2>Tambah Peminjaman</h2>
    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf
        <label for="book_id">Buku</label>
        <select id="book_id" name="book_id" required>
            @foreach($books as $book)
            <option value="{{ $book->id }}">{{ $book->judul }}</option>
            @endforeach
        </select>
        <br>

        <label for="users_id">User</label>
        <select id="users_id" name="users_id" required>
            @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <br>

        <label for="tanggal_pinjam">Tanggal Pinjam</label>
        <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" required>
        <br>

        <button type="submit">Simpan</button>
    </form>
</body>

</html>
