<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Booksseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'judul_buku' => 'Pemrograman Web Dasar',
                'deskripsi' => 'Buku ini mengajarkan dasar-dasar pemrograman web dengan HTML, CSS, dan JavaScript.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul_buku' => 'Dasar-dasar Pemrograman Java',
                'deskripsi' => 'Buku ini adalah pengantar untuk pemrograman menggunakan bahasa Java, cocok untuk pemula.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul_buku' => 'Pengenalan Python untuk Data Science',
                'deskripsi' => 'Belajar Python untuk analisis data, termasuk penggunaan pustaka seperti Pandas dan NumPy.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul_buku' => 'Teknik Pengembangan Aplikasi Mobile',
                'deskripsi' => 'Buku ini membahas cara membangun aplikasi mobile untuk platform Android dan iOS.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul_buku' => 'Pengantar Machine Learning',
                'deskripsi' => 'Buku ini mengenalkan dasar-dasar machine learning dengan menggunakan Python dan pustaka seperti Scikit-learn.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
