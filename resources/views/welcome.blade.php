<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f9fafb;
            color: #2d3436;
            margin: 0;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .btn {
            display: inline-block;
            padding: 0.5rem 1.5rem;
            border-radius: 0.5rem;
            text-transform: uppercase;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-blue {
            background-color: #2563eb;
            color: white;
        }

        .btn-blue:hover {
            background-color: #1d4ed8;
        }

        .btn-green {
            background-color: #10b981;
            color: white;
        }

        .btn-green:hover {
            background-color: #059669;
        }

        .navbar {
            background-color: rgba(30, 58, 138, 0.9);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .navbar.scrolled {
            background-color: #1e3a8a;
        }

        footer {
            background-color: #1e293b;
            color: #f3f4f6;
        }

        .heading-title {
            font-size: 2.5rem;
            font-weight: 600;
            color: #2d3436;
        }

        .heading-subtitle {
            font-size: 1.2rem;
            color: #4a5568;
            margin-top: 1rem;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2d3436;
            margin-bottom: 1.5rem;
        }

        .card-content {
            font-size: 1rem;
            color: #4a5568;
        }

        /* Hero Section */
        .hero {
            position: relative;
            background-image: url('https://images.pexels.com/photos/159711/books-bookstore-book-reading-159711.jpeg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #ffffff;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.3);
        }

        .hero-content {
            z-index: 1;
            text-align: center;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 600;
            margin-bottom: 20px;
            animation: fadeIn 1s ease-in-out;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 30px;
            animation: fadeIn 1.5s ease-in-out;
        }

        /* Animasi Fade In */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        /* Testimonial Section */
        .testimonials-container {
            display: flex;
            justify-content: space-around;
            gap: 20px;
            flex-wrap: wrap;
        }

        .testimonial-card {
            width: 100%;
            max-width: 350px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transform: translateY(50px);
            opacity: 0;
            transition: all 0.5s ease;
        }

        .testimonial-card.visible {
            transform: translateY(0);
            opacity: 1;
        }

        /* Footer */
        .footer-link {
            text-decoration: none;
            color: #4b5563;
            margin-right: 15px;
        }

        .footer-link:hover {
            color: white;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar fixed top-0 left-0 w-full py-4 z-10">
        <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
            <h1 class="text-3xl font-bold text-white">Perpustakaan Digital</h1>
            <div class="space-x-4">
                @auth
                <form action="{{ route('logout') }}" method="POST" class="inline-block">
                    @csrf
                    <button class="btn bg-red-600 text-white hover:bg-red-700">Keluar</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="btn btn-blue">Masuk</a>
                <a href="{{ route('register') }}" class="btn btn-green">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero pt-20">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h2 class="hero-title">Selamat Datang di Perpustakaan Digital!</h2>
            <p class="hero-subtitle">Platform edukasi yang memberikan akses tak terbatas ke koleksi buku digital untuk mempermudah proses pembelajaran. Silakan masuk atau daftar untuk menikmati fitur kami.</p>
            @if(isset($user))
            <p class="hero-subtitle">Selamat datang, {{ $user->nama_anggota }}. Nikmati berbagai kemudahan yang kami tawarkan.</p>
            @endif
        </div>
    </section>

    @auth
<!-- Call to Action -->
<section class="bg-indigo-700 text-white py-16 text-center">
    <div class="max-w-3xl mx-auto px-6">
        <h2 class="text-4xl font-extrabold">Ayo Jelajahi Koleksi Buku Digital!</h2>
        <p class="mt-4 text-lg text-gray-200">
            Ribuan buku siap menemani perjalanan belajarmu. Cari, baca, dan tambah wawasan kapan saja, di mana saja!
        </p>
        <a href="{{ route('books.index') }}" class="mt-6 inline-block bg-white text-indigo-700 font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-gray-200 transition duration-300">
            Lihat Koleksi Buku
        </a>
    </div>
</section>
@endauth


    <!-- Testimoni Section -->
    <section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Ulasan Pengguna Kami</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Testimonial 1 -->
            <div class="testimonial-card p-8 bg-white rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                <p class="text-gray-600 text-lg italic">"Perpustakaan digital ini sangat mempermudah saya dalam mengakses materi pembelajaran. Fasilitas yang tersedia membuat saya lebih siap menghadapi ujian dengan efisien."</p>
                <p class="mt-6 text-lg font-medium text-gray-800">- Akbar, Siswa SMK Antartika 1</p>
            </div>
            
            <!-- Testimonial 2 -->
            <div class="testimonial-card p-8 bg-white rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                <p class="text-gray-600 text-lg italic">"Dengan akses yang mudah dan cepat, perpustakaan digital ini memberikan fleksibilitas untuk belajar di mana saja. Saya merasa lebih siap untuk ujian berkat berbagai materi yang tersedia."</p>
                <p class="mt-6 text-lg font-medium text-gray-800">- Ibra, Siswa SMK Antartika 1</p>
            </div>
        </div>
    </div>
</section>



    <!-- Footer -->
    <footer class="py-12 bg-gray-900 text-gray-300">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center">
            <p class="text-lg font-semibold">© 2025 Perpustakaan Digital SMK Antartika 1. Semua Hak Dilindungi.</p>
            <div class="flex justify-center gap-8 mt-6">
                <a href="https://youtube.com/@smkantartika1sidoarjo726?si=Yk9lG8BciIRya1HO" class="text-xl hover:text-gray-400 flex items-center gap-2">
                    <i class="material-icons-outlined">play_arrow</i>
                    YouTube
                </a>
                <a href="https://www.instagram.com/smkantartika1sda?igsh=MWZhcGhwcmhwaTFzdw==" class="text-xl hover:text-gray-400 flex items-center gap-2">
                    <i class="material-icons-outlined">camera_alt</i>
                    Instagram
                </a>
            </div>
        </div>
    </div>
</footer>


    <script>
        // Navbar Scroll Effect
        window.addEventListener('scroll', function () {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Testimonial Animation
        const testimonials = document.querySelectorAll('.testimonial-card');
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.5 });
        
        testimonials.forEach(testimonial => {
            observer.observe(testimonial);
        });
    </script>
</body>

</html>
