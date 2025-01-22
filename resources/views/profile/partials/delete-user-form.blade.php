<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Perpustakaan</title>
    @vite('resources/css/app.css') <!-- Menyertakan Tailwind CSS -->
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-200 font-sans antialiased">

    <div class="min-h-screen flex flex-col justify-center items-center py-12 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="text-center">
            <h1 class="text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-blue-500 to-green-500">
                Selamat datang di Perpustakaan!
            </h1>
            <p class="mt-4 text-lg text-gray-700">Aplikasi manajemen perpustakaan untuk Anda.</p>
        </div>

        <!-- Buttons Section -->
        <div class="mt-8 flex space-x-4">
            @auth
                <!-- Tombol Logout -->
                <form action="{{ route('logout') }}" method="POST" class="inline-block">
                    @csrf
                    <button type="submit" class="px-6 py-3 bg-red-500 text-white text-lg font-semibold rounded-full shadow-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-50">
                        Logout
                    </button>
                </form>
            @else
                <!-- Tombol Login -->
                <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-500 text-white text-lg font-semibold rounded-full shadow-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                    Login
                </a>
                <!-- Tombol Register -->
                <a href="{{ route('register') }}" class="px-6 py-3 bg-green-500 text-white text-lg font-semibold rounded-full shadow-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50">
                    Register
                </a>
            @endauth
        </div>

        <!-- Additional Info Section -->
        <div class="mt-8 text-center">
            @auth
                <p class="text-gray-600">Terima kasih telah login! Selamat mengelola perpustakaan Anda.</p>
            @else
                <p class="text-gray-600">Sudah memiliki akun? <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:underline">Masuk sekarang</a></p>
            @endauth
        </div>

        <!-- Decorative Section -->
        <div class="mt-12 grid grid-cols-1 sm:grid-cols-3 gap-4 w-full max-w-4xl">
            <div class="flex items-center bg-blue-100 p-4 rounded-lg shadow-md">
                <span class="material-icons-outlined text-blue-500 mr-4">book</span>
                <div>
                    <h3 class="text-lg font-bold text-blue-700">Total Buku</h3>
                    <p class="text-sm text-gray-600">Kelola koleksi buku Anda dengan mudah.</p>
                </div>
            </div>
            <div class="flex items-center bg-green-100 p-4 rounded-lg shadow-md">
                <span class="material-icons-outlined text-green-500 mr-4">group</span>
                <div>
                    <h3 class="text-lg font-bold text-green-700">Anggota Aktif</h3>
                    <p class="text-sm text-gray-600">Pantau data anggota perpustakaan.</p>
                </div>
            </div>
            <div class="flex items-center bg-yellow-100 p-4 rounded-lg shadow-md">
                <span class="material-icons-outlined text-yellow-500 mr-4">event</span>
                <div>
                    <h3 class="text-lg font-bold text-yellow-700">Peminjaman Hari Ini</h3>
                    <p class="text-sm text-gray-600">Lihat transaksi peminjaman terkini.</p>
                </div>
            </div>
        </div>

        <!-- Account Deletion Section -->
        <section class="space-y-6 mt-12 bg-white shadow-md rounded-lg p-6 w-full max-w-4xl">
            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Delete Account') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                </p>
            </header>

            <x-danger-button
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            >{{ __('Delete Account') }}</x-danger-button>

            <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                    @csrf
                    @method('delete')

                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Are you sure you want to delete your account?') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>

                    <div class="mt-6">
                        <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                        <x-text-input
                            id="password"
                            name="password"
                            type="password"
                            class="mt-1 block w-3/4"
                            placeholder="{{ __('Password') }}"
                        />

                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-danger-button class="ms-3">
                            {{ __('Delete Account') }}
                        </x-danger-button>
                    </div>
                </form>
            </x-modal>
        </section>

    </div>

    <!-- Icons (Material Icons) -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
</body>
</html>
