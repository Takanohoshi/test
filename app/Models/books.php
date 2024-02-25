<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;
    
    protected $fillable = ['cover', 'judul','penulis','penerbit', 'tahun', 'deskripsi', 'username'];
    
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category', 'book_id', 'category_id');
        return $this->belongsToMany(Category::class)->detach();
    }
    
}
