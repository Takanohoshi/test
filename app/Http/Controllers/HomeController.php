<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class HomeController extends Controller
{
    public function index()
    {
        $books = Books::all();

        return view('home', compact('books'));
    }

    public function detail($id)
    {
        $book = Books::findOrFail($id);

        return view('detail', compact('book'));
    }
}
