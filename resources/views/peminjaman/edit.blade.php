<!-- resources/views/peminjaman/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peminjaman</title>
</head>

<body>
    <h2>Edit Peminjaman</h2>
    <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="book_id">Buku</label>
        <select id="book_id" name="book_id" required>
            @foreach($books as $book)
            <option value="{{ $book->id }}" @if($book->id == $peminjaman->book_id) selected @endif>{{ $book->judul }}</option>
            @endforeach
        </select>
        <br>

        <label for="users_id">User</label>
        <select id="users_id" name="users_id" required>
            @foreach($users as $user)
            <option value="{{ $user->id }}" @if($user->id == $peminjaman->users_id) selected @endif>{{ $user->nama }}</option>
            @endforeach
        </select>
        <br>

        <label for="tanggal_pinjam">Tanggal Pinjam</label>
        <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ $peminjaman->tanggal_pinjam }}" required>
        <br>

        <label for="status">Status</label>
        <select id="status" name="status" required>
            <option value="dipinjam" @if($peminjaman->status == 'dipinjam') selected @endif>Dipinjam</option>
            <option value="dikembalikan" @if($peminjaman->status == 'dikembalikan') selected @endif>Dikembalikan</option>
        </select>
        <br>

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>

</html>
