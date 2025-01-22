<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class DaftarbukuControllers extends Controller
{
    public function index()
    {
        $books = Book::all(); // Fetch all books from the database
        return view('daftar-buku', compact('books')); // Return the view and pass books data
    }
}
