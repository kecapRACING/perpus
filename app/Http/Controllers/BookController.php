<?php

// BookController.php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Pustaka;
use Illuminate\Http\Request;

class BookController extends Controller
{

    

    public function index()
    {

        $pustakas = Pustaka::all();// Fetch all books from the database
        return view('books.index', compact('pustakas')); // Return the view and pass books data
    }
}

