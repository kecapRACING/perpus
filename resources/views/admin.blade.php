<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gradient-to-br from-gray-800 to-gray-900 text-white">
            <div class="p-4 text-center border-b border-gray-700">
                <h2 class="text-2xl font-bold">Admin Dashboard</h2>
            </div>
            <ul class="space-y-2 px-4 py-6">
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center py-2 px-4 hover:bg-gray-700 rounded transition">
                        <span class="material-icons-outlined mr-2">dashboard</span>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile.edit') }}" class="flex items-center py-2 px-4 hover:bg-gray-700 rounded transition">
                        <span class="material-icons-outlined mr-2">person</span>
                        Profile
                    </a>
                </li>
                <li>
                    <a href="{{ route('rak.index') }}" class="flex items-center py-2 px-4 hover:bg-gray-700 rounded transition">
                        <span class="material-icons-outlined mr-2">inventory_2</span>
                        Rak
                    </a>
                </li>
                <li>
                    <a href="{{ route('ddc.index') }}" class="flex items-center py-2 px-4 hover:bg-gray-700 rounded transition">
                        <span class="material-icons-outlined mr-2">library_books</span>
                        DDC
                    </a>
                </li>
                <li>
                    <a href="{{ route('format.index') }}" class="flex items-center py-2 px-4 hover:bg-gray-700 rounded transition">
                        <span class="material-icons-outlined mr-2">format_list_bulleted</span>
                        Format
                    </a>
                </li>
                <!-- Add similar structure for the rest of the links -->
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="mb-4 border-b border-gray-300 pb-4">
                <h2 class="text-2xl font-bold text-gray-800">{{ $header ?? 'Dashboard' }}</h2>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="text-gray-900">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

    <!-- Icons (Material Icons) -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
</body>
</html>
