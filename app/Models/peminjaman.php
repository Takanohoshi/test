<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;
    
    // Definisi atribut-atribut yang dapat diisi
    protected $fillable = ['book_id', 'users_book', 'tanggal_pinjam', 'status'];

    // Relasi dengan model Buku
    public function buku()
    {
        return $this->belongsTo(Books::class, 'book_id');
    }

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
