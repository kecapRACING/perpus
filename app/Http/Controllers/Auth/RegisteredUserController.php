<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Anggota; // Gunakan model Anggota
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'kode_anggota' => ['required', 'string', 'max:20', 'unique:tbl_anggota'],
            'nama_anggota' => ['required', 'string', 'max:100', 'unique:tbl_anggota'],
            'tempat' => ['required', 'string', 'max:20'],
            'tgl_lahir' => ['required', 'date'],
            'alamat' => ['required', 'string', 'max:50'],
            'no_telp' => ['required', 'string', 'max:15'],
            'email' => ['required', 'email', 'max:30', 'unique:tbl_anggota'],
            'tgl_daftar' => ['required', 'date'],
            'masa_aktif' => ['required', 'date'],
            'fa' => ['required', 'in:Y,T'],
            'keterangan' => ['required', 'string', 'max:45'],
            'foto' => ['image'], // Foto harus diupload
            'username' => ['required', 'string', 'max:50', 'unique:tbl_anggota'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    
        // Proses penyimpanan file foto
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            // Menyimpan file dengan nama unik
            $path = $request->file('foto')->store('public/foto');
        } else {
            return back()->with('error', 'File tidak valid.');
        }
    
        $anggota = Anggota::create([
            'id_jenis_anggota' =>2,
            'kode_anggota' => $request->kode_anggota,
            'nama_anggota' => $request->nama_anggota,
            'tempat' => $request->tempat,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'tgl_daftar' => $request->tgl_daftar,
            'masa_aktif' => $request->masa_aktif,
            'fa' => $request->fa,
            'keterangan' => $request->keterangan,
            'foto' => $path, // Menyimpan path foto
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
    
        event(new Registered($anggota));
    
        auth()->login($anggota);
    
        return redirect(route('dashboard')); // Ganti dengan rute yang sesuai
    }
    
}
