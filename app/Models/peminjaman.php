<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';  
    // Menentukan kolom mana yang bisa diisi secara massal
    protected $fillable = ['pustaka_id', 'user_id', 'tanggal_peminjaman'];

    // Menentukan relasi dengan model Pustaka (buku)
    public function pustaka()
    {
        return $this->belongsTo(Pustaka::class);
    }

    // Menentukan relasi dengan model User (user yang meminjam)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
