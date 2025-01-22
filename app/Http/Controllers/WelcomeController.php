<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display the welcome view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengecek apakah ada user yang sedang login
        if (auth()->check()) {
            // Mendapatkan data user yang sedang login
            $user = auth()->user();

            // Mengirimkan data user ke view 'welcome'
            return view('welcome', ['user' => $user]);
        }
    
        // Jika tidak ada user yang login, tetap menampilkan halaman 'welcome'
        return view('welcome');
    }
    
}
