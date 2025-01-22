<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Admin Perpustakaan') }}</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-72 bg-gradient-to-br from-blue-800 to-blue-600 text-white p-6 fixed top-0 left-0 h-screen shadow-lg z-10">
            <div class="flex flex-col h-full">
                <div class="mb-8 text-center">
                    <h3 class="text-3xl font-bold text-yellow-400">Admin Perpustakaan</h3>
                </div>

                <!-- Navigation -->
                <nav>
                    <ul class="space-y-4">
                        <li>
                            <a href="{{ route('dashboard') }}" class="flex items-center text-lg px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 {{ request()->routeIs('dashboard') ? 'bg-blue-700' : '' }}">
                                <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('rak.index') }}" class="flex items-center text-lg px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 {{ request()->routeIs('rak.index') ? 'bg-blue-700' : '' }}">
                                <i class="fas fa-cogs mr-3"></i> Rak
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('ddc.index') }}" class="flex items-center text-lg px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 {{ request()->routeIs('ddc.index') ? 'bg-blue-700' : '' }}">
                                <i class="fas fa-th-list mr-3"></i> DDC
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('format.index') }}" class="flex items-center text-lg px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 {{ request()->routeIs('format.index') ? 'bg-blue-700' : '' }}">
                                <i class="fas fa-clipboard-list mr-3"></i> Format
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('penerbit.index') }}" class="flex items-center text-lg px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 {{ request()->routeIs('penerbit.index') ? 'bg-blue-700' : '' }}">
                                <i class="fas fa-print mr-3"></i> Penerbit
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pengarang.index') }}" class="flex items-center text-lg px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 {{ request()->routeIs('pengarang.index') ? 'bg-blue-700' : '' }}">
                                <i class="fas fa-user-edit mr-3"></i> Pengarang
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('jenis_anggota.index') }}" class="flex items-center text-lg px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 {{ request()->routeIs('jenis_anggota.index') ? 'bg-blue-700' : '' }}">
                                <i class="fas fa-users mr-3"></i> Jenis Anggota
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pustaka.index') }}" class="flex items-center text-lg px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 {{ request()->routeIs('pustaka.index') ? 'bg-blue-700' : '' }}">
                                <i class="fas fa-book mr-3"></i> Pustaka
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('anggota.index') }}" class="flex items-center text-lg px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 {{ request()->routeIs('anggota.index') ? 'bg-blue-700' : '' }}">
                                <i class="fas fa-users mr-3"></i> Anggota
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('transaksi.index') }}" class="flex items-center text-lg px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 {{ request()->routeIs('transaksi.index') ? 'bg-blue-700' : '' }}">
                                <i class="fas fa-exchange-alt mr-3"></i> Transaksi
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Logout -->
                <div class="mt-auto">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center justify-center w-full text-lg bg-red-600 hover:bg-red-500 px-4 py-3 rounded-lg text-white transition duration-300">
                            <i class="fas fa-sign-out-alt mr-3"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-72 p-6 bg-gray-100">
            <header class="bg-white shadow-md p-4 rounded-lg mb-6">
                <h1 class="text-2xl font-semibold text-gray-800">@yield('header', 'Admin Dashboard')</h1>
            </header>
            <section class="bg-white p-6 shadow-md rounded-lg">
                @yield('content')
            </section>
        </main>
    </div>

    @vite('resources/js/app.js')
</body>

</html>
