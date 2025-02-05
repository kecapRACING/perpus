<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Admin Perpustakaan') }}</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/lucide@latest"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body class="bg-gradient-to-br from-gray-100 via-blue-100 to-gray-200 font-sans">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-72 bg-gradient-to-br from-[#1E3A8A] to-[#3B82F6] text-white p-6 fixed top-0 left-0 h-screen shadow-xl z-10 overflow-y-auto scrollbar-thin scrollbar-thumb-blue-500 scrollbar-track-blue-300 backdrop-blur-xl bg-opacity-90">
            <div class="flex flex-col h-full">
                <!-- Brand -->
                <div class="mb-8 text-center">
                    <h3 class="text-3xl font-bold text-yellow-300">📚 Admin Perpustakaan</h3>
                </div>

                <!-- Navigation -->
                <nav>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('dashboard') }}" class="flex items-center text-lg px-4 py-3 rounded-lg hover:bg-blue-500 transition duration-300 {{ request()->routeIs('dashboard') ? 'bg-blue-500' : '' }}">
                                <i class="fas fa-tachometer-alt w-6 h-6 mr-3"></i> Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('rak.index') }}" class="flex items-center text-lg px-4 py-3 rounded-lg hover:bg-blue-500 transition duration-300 {{ request()->routeIs('rak.index') ? 'bg-blue-500' : '' }}">
                                <i class="fas fa-layer-group w-6 h-6 mr-3"></i> Rak
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('ddc.index') }}" class="flex items-center text-lg px-4 py-3 rounded-lg hover:bg-blue-500 transition duration-300 {{ request()->routeIs('ddc.index') ? 'bg-blue-500' : '' }}">
                                <i class="fas fa-list w-6 h-6 mr-3"></i> DDC
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('format.index') }}" class="flex items-center text-lg px-4 py-3 rounded-lg hover:bg-blue-500 transition duration-300 {{ request()->routeIs('format.index') ? 'bg-blue-500' : '' }}">
                                <i class="fas fa-clipboard-list w-6 h-6 mr-3"></i> Format
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('penerbit.index') }}" class="flex items-center text-lg px-4 py-3 rounded-lg hover:bg-blue-500 transition duration-300 {{ request()->routeIs('penerbit.index') ? 'bg-blue-500' : '' }}">
                                <i class="fas fa-book-open w-6 h-6 mr-3"></i> Penerbit
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pengarang.index') }}" class="flex items-center text-lg px-4 py-3 rounded-lg hover:bg-blue-500 transition duration-300 {{ request()->routeIs('pengarang.index') ? 'bg-blue-500' : '' }}">
                                <i class="fas fa-pen-nib w-6 h-6 mr-3"></i> Pengarang
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('jenis_anggota.index') }}" class="flex items-center text-lg px-4 py-3 rounded-lg hover:bg-blue-500 transition duration-300 {{ request()->routeIs('jenis_anggota.index') ? 'bg-blue-500' : '' }}">
                                <i class="fas fa-users w-6 h-6 mr-3"></i> Jenis Anggota
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pustaka.index') }}" class="flex items-center text-lg px-4 py-3 rounded-lg hover:bg-blue-500 transition duration-300 {{ request()->routeIs('pustaka.index') ? 'bg-blue-500' : '' }}">
                                <i class="fas fa-book w-6 h-6 mr-3"></i> Pustaka
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('anggota.index') }}" class="flex items-center text-lg px-4 py-3 rounded-lg hover:bg-blue-500 transition duration-300 {{ request()->routeIs('anggota.index') ? 'bg-blue-500' : '' }}">
                                <i class="fas fa-user-check w-6 h-6 mr-3"></i> Anggota
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('transaksi.index') }}" class="flex items-center text-lg px-4 py-3 rounded-lg hover:bg-blue-500 transition duration-300 {{ request()->routeIs('transaksi.index') ? 'bg-blue-500' : '' }}">
                                <i class="fas fa-exchange-alt w-6 h-6 mr-3"></i> Transaksi
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Logout -->
                <div class="mt-auto">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center justify-center w-full text-lg bg-gradient-to-r from-red-600 to-red-500 hover:from-red-500 hover:to-red-400 px-4 py-3 rounded-lg text-white transition duration-300">
                            <i class="fas fa-sign-out-alt w-6 h-6 mr-3"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-72 p-6">
            <header class="bg-white/70 backdrop-blur-lg shadow-lg p-4 rounded-lg mb-6 flex justify-between items-center">
                <h1 class="text-2xl font-semibold text-gray-800">@yield('header', 'Admin Dashboard')</h1>
            </header>
            <section class="bg-white p-6 shadow-md rounded-lg">
                @yield('content')
            </section>
        </main>
    </div>

</body>

</html>