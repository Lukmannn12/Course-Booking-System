<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Kursus') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="p-2">
                        <h1 class="text-xl font-bold mb-4">Manajemen Data Kursus</h1>

                        <a href="{{ route('datakursus.create') }}"
                            class="inline-block bg-green-500 text-sm text-white font-semibold px-4 py-2 rounded shadow transition">
                            + Tambah Kursus
                        </a>

                        @if (session()->has('message'))
                        <div id="alert" class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg opacity-0 transform translate-y-[-10px] transition-all duration-500 z-50">
                            {{ session('message') }}
                        </div>
                        @endif

                        <!-- Menambahkan overflow-x-auto untuk membuat tabel responsif -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full table-auto border-collapse mt-4 text-sm text-center">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border p-2">Id</th>
                                        <th class="border p-2">Title</th>
                                        <th class="border p-2">Description</th>
                                        <th class="border p-2">Category</th>
                                        <th class="border p-2">Level</th>
                                        <th class="border p-2">Price</th>
                                        <th class="border p-2">Start Date</th>
                                        <th class="border p-2">End Date</th>
                                        <th class="border p-2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($courses as $course)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border p-2">{{ $course->id }}</td>
                                        <td class="border p-2">{{ $course->title }}</td>
                                        <td class="border p-2">{{ $course->description }}</td>
                                        <td class="border p-2">{{ $course->category }}</td>
                                        <td class="border p-2">{{ $course->level }}</td>
                                        <td class="border p-2 text-sm">Rp {{ number_format($course->price, 0, ',', '.') }}</td>
                                        <td class="border p-2 text-sm">{{ \Carbon\Carbon::parse($course->start_date)->format('d F Y') }}</td>
                                        <td class="border p-2 text-sm">{{ \Carbon\Carbon::parse($course->end_date)->format('d F Y') }}</td>
                                        <td class="border p-2 flex justify-center items-center">
                                            <a href="{{ route('datakursus.edit', $course) }}" class="text-blue-500 mr-2">
                                                <i class="fas fa-edit w-5 h-5"></i>
                                            </a>

                                            <!-- Form Hapus -->
                                            <form action="{{ route('datakursus.destroy', $course) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?');" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500">
                                                    <i class="fas fa-trash-alt w-5 h-5"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alert = document.getElementById('alert');
            if (alert) {
                // Tampilkan alert
                setTimeout(() => {
                    alert.classList.remove('opacity-0', 'translate-y-[-10px]');
                    alert.classList.add('opacity-100', 'translate-y-0');
                }, 100); // Delay sedikit agar transisi smooth

                // Sembunyikan alert setelah 3 detik
                setTimeout(() => {
                    alert.classList.remove('opacity-100', 'translate-y-0');
                    alert.classList.add('opacity-0', 'translate-y-[-10px]');
                }, 3000);
            }
        });
    </script>

</x-app-layout>