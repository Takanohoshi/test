<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Definisi relasi many-to-many dengan model books
    public function books()
    {
        return $this->belongsToMany(books::class, 'book_category', 'category_id', 'book_id');
    }
}
