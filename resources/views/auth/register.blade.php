<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Kode Anggota -->
        <div>
            <x-input-label for="kode_anggota" :value="__('Kode Anggota')" />
            <x-text-input id="kode_anggota" class="block mt-1 w-full" type="text" name="kode_anggota"
                :value="old('kode_anggota')" required />
            <x-input-error :messages="$errors->get('kode_anggota')" class="mt-2" />
        </div>

        <!-- Nama Anggota -->
        <div>
            <x-input-label for="nama_anggota" :value="__('Nama Anggota')" />
            <x-text-input id="nama_anggota" class="block mt-1 w-full" type="text" name="nama_anggota"
                :value="old('nama_anggota')" required />
            <x-input-error :messages="$errors->get('nama_anggota')" class="mt-2" />
        </div>

        <!-- Tempat -->
        <div class="mt-4">
            <x-input-label for="tempat" :value="__('Tempat')" />
            <x-text-input id="tempat" class="block mt-1 w-full" type="text" name="tempat" :value="old('tempat')"
                required />
            <x-input-error :messages="$errors->get('tempat')" class="mt-2" />
        </div>

        <!-- Tanggal Lahir -->
        <div class="mt-4">
            <x-input-label for="tgl_lahir" :value="__('Tanggal Lahir')" />
            <x-text-input id="tgl_lahir" class="block mt-1 w-full" type="date" name="tgl_lahir"
                :value="old('tgl_lahir')" required />
            <x-input-error :messages="$errors->get('tgl_lahir')" class="mt-2" />
        </div>

        <!-- Alamat -->
        <div class="mt-4">
            <x-input-label for="alamat" :value="__('Alamat')" />
            <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')"
                required />
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>

        <!-- No Telepon -->
        <div class="mt-4">
            <x-input-label for="no_telp" :value="__('No Telepon')" />
            <x-text-input id="no_telp" class="block mt-1 w-full" type="text" name="no_telp" :value="old('no_telp')"
                required />
            <x-input-error :messages="$errors->get('no_telp')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Tanggal Daftar -->
        <div class="mt-4">
            <x-input-label for="tgl_daftar" :value="__('Tanggal Daftar')" />
            <x-text-input id="tgl_daftar" class="block mt-1 w-full" type="date" name="tgl_daftar"
                :value="old('tgl_daftar')" required />
            <x-input-error :messages="$errors->get('tgl_daftar')" class="mt-2" />
        </div>

        <!-- Masa Aktif -->
        <div class="mt-4">
            <x-input-label for="masa_aktif" :value="__('Masa Aktif')" />
            <x-text-input id="masa_aktif" class="block mt-1 w-full" type="date" name="masa_aktif"
                :value="old('masa_aktif')" required />
            <x-input-error :messages="$errors->get('masa_aktif')" class="mt-2" />
        </div>

        <!-- FA -->
        <div class="mt-4">
            <x-input-label for="fa" :value="__('Status FA')" />
            <x-text-input id="fa" class="block mt-1 w-full" type="text" name="fa" :value="old('fa')" required />
            <x-input-error :messages="$errors->get('fa')" class="mt-2" />
        </div>

        <!-- Keterangan -->
        <div class="mt-4">
            <x-input-label for="keterangan" :value="__('Keterangan')" />
            <x-text-input id="keterangan" class="block mt-1 w-full" type="text" name="keterangan"
                :value="old('keterangan')" required />
            <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
        </div>

        <!-- Foto -->
        <div class="mt-4">
            <x-input-label for="foto" :value="__('Foto')" />
            <input type="file" id="foto" name="foto" class="block mt-1 w-full" />
            <x-input-error :messages="$errors->get('foto')" class="mt-2" />
        </div>



        <!-- Username -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"
                required />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>