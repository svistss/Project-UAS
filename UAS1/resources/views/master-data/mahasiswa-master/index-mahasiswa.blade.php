<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container p-4 mx-auto">
        <div class="overflow-x-auto">

            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                    role="alert">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                    role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form method="GET" action="{{ route('mahasiswa-index') }}" class="mb-4 flex items-center">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari mahasiswa..."
                    class="w-1/4 rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                <button type="submit"
                    class="ml-2 rounded-lg bg-green-500 px-4 py-2 text-white shadow-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Cari</button>
            </form>

            <a href="{{ route('mahasiswa-create') }}">
                <button
                    class="px-6 py-4 text-white bg-green-500 border border-green-500 rounded-lg shadow-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Tambahkan data Mahasiswa
                </button>
            </a>
            <table class="min-w-full border border-collapse border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">ID</th>
                        <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">NPM</th>
                        <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Nama</th>
                        <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Program Studi</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($mahasiswas as $mahasiswa)
                        <tr class="bg-white">
                        </tr>
                        <tr class="bg-white">
                            <otd class="px-4 py-2 border border-gray-200">{{ $mahasiswa->npm }}</td>
                                <td class="px-4 py-2 border border-gray-200 hover:text-blue-500 hover:underline">
                                    <a href="{{ route('mahasiswa-detail', $mahasiswa->npm) }}">
                                        {{ $mahasiswa->nama }}
                                    </a>
                                </td>
                                <td class="px-4 py-2 border border-gray-200">{{ $mahasiswa->id }}</td>
                                <td class="px-4 py-2 border border-gray-200">{{ $mahasiswa->npm }}</td>
                                <td class="px-4 py-2 border border-gray-200">{{ $mahasiswa->nama }}</td>
                                <td class="px-4 py-2 border border-gray-200">{{ $mahasiswa->prodi }}</td>
                                </td>

                                <td class="px-4 py-2 border border-gray-200">
                                    <a href="{{ route('mahasiswa-edit', $mahasiswa->npm) }}"
                                        class="px-2 text-blue-600 hover:text-blue-800">Edit</a>
                                    <button class="px-2 text-red-600 hover:text-red-800"
                                        onclick="confirmDelete('{{ route('mahasiswa-deleted', $mahasiswa->id) }}')">Hapus</button>
                                </td>
                        </tr>
                    @empty
                        <p class="mb-4 text-center text-2xl font-bold text-red-600">Tidak ada data mahasiswa</p>
                    @endforelse


                    <!-- Tambahkan baris lainnya sesuai kebutuhan -->
                </tbody>
            </table>
        </div>
    </div>


    <script>
        function confirmDelete(deleteUrl) {
            console.log(deleteUrl);
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                // Jika user mengonfirmasi, kita dapat membuat form dan mengirimkan permintaan delete
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = deleteUrl;

                // Tambahkan CSRF token
                let csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = '{{ csrf_token() }}';
                form.appendChild(csrfInput);

                // Tambahkan method spoofing untuk DELETE (karena HTML form hanya mendukung GET dan POST)
                let methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                form.appendChild(methodInput);

                // Tambahkan form ke body dan submit
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>




</x-app-layout>
