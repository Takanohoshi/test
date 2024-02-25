@include('layouts.nav')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        h1 {
            font-size: 2em;
        }

        .books-container {
            display: flex;
            flex-wrap: wrap;
        }

        .book {
            color: inherit;
            margin: 10px;
            text-align: center;
        }

        .book img {
            max-width: 150px; /* Atur lebar maksimal cover */
            height: auto;
        }

        .book h3 {
            text-align: left;
            color: inherit;
            font-size: 2em; /* Atur ukuran font judul */
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <center>
    <h1>SELAMAT DATANG DI LIBRARY</h1>
    <h2>KAWASAN WAJIB MEMBACA</h2>
    </center>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h1>Daftar Buku</h1>

    <div class="books-container">
        @foreach($books as $book)
            <div class="book">
                <img src="{{ asset('storage/cover/' . $book->cover) }}" alt="{{ $book->judul }} Cover">
                <h3><a href="{{ route('detail', ['id' => $book->id]) }}">{{ $book->judul }}</a></h3>
            </div>
        @endforeach
    </div>
</body>
</html>
