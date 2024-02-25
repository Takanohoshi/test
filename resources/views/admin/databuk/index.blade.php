@extends('layouts.mimin')

@section('container')

<h1 class="h2">Data buku</h1>

@if (session()->has('success'))
<div class="alert alert-success col-lg-12" role="alert">
    {{ session('success') }}
</div>
@endif

<!-- Your search form code goes here -->
<form action="{{ route('databuk.index') }}" method="GET" class="form-inline">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Cari Buku">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
</form>

<br>
<div class="text-end">
    <a href="{{ route('databuk.create') }}" class="btn btn-primary mb-3">Buat Buku Baru</a>
</div>

<div class="table-responsive col-lg-12">
    <table class="table table-sm table-bordered table-hover border-dark text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Cover</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach ($bukudata as $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>
                    <img src="{{ asset('storage/cover/' . $item->cover) }}" alt="Cover Artikel" class="img-fluid" width="100">
                </td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->penulis }}</td>
                <td>{{ $item->penerbit }}</td>
                <td>{{ $item->tahun }}</td>
                <td>
                    @foreach ($item->categories as $category)
                        {{ $category->name }},
                    @endforeach
                </td>
                <td>{{ $item->deskripsi }}</td>
                <td>
                    <a href="{{ route('databuk.edit', $item->id) }}" class="badge bg-warning" onclick="return confirm('Apakah Anda Yakin?')">
                        <span>Edit</span>
                    </a>
                    <form action="{{ route('databuk.destroy', $item->id) }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Menghapus Data Ini Akan Mempengaruhi Data Lain, Anda Yakin?')">
                            <span>Hapus</span>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>




@endsection
