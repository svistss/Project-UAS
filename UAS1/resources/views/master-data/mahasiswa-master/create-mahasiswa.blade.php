<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Data Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="container p-4 mx-auto">
        <!-- Menampilkan pesan sukses jika ada -->
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-800 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="container p-4 mx-auto">
            <!-- Form untuk menambah data mahasiswa -->
            <form action="{{ route('mahasiswa-store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="npm" class="block text-sm font-medium text-black">NPM</label>
                    <input type="text" id="npm" name="npm" value="{{ old('npm') }}" required
                        class="mt-1 block w-full rounded-md border-black shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-black">Nama</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                        class="mt-1 block w-full rounded-md border-black shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="prodi" class="block text-sm font-medium text-black">Prodi</label>
                    <input type="text" id="prodi" name="prodi" value="{{ old('prodi') }}" required
                        class="mt-1 block w-full rounded-md border-black shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <button type="submit"
                        class="px-6 py-4 text-black bg-blue-200 border border-black rounded-lg shadow-lg hover:bg-blue-500 focus:outline-none focus:ring-1 focus:ring-black">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
</x-app-layout>
