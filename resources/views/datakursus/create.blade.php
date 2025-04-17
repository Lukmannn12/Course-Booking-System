<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
        <span>{{ __('Data Kursus') }}</span>
        <i class="fa fa-arrow-right mx-2 text-sm"></i>
        <span>{{ __('Create') }}</span>
    </h2>
</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="p-2">
                        <h1 class="text-xl font-bold mb-4">Tambah Data Kursus</h1>

                        <!-- Form Input Data Kursus -->
                        <form action="{{ route('datakursus.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Title -->
                            <div class="mb-4 flex gap-4">
                                <div class="w-1/2">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                                        class="mt-1 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm"
                                        placeholder="Judul" required>
                                </div>
                                <div class="w-1/2">
                                <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
                                <input type="number" name="price" id="price" value="{{ old('price') }}"
                                    class="mt-1 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm"
                                    placeholder="Harga" required>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="mb-4">
                                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                <textarea name="description" id="description" rows="3"
                                    class="mt-1 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm"
                                    placeholder="Deskripsi" required>{{ old('description') }}</textarea>
                            </div>

                            <!-- Category & Level (2 in 1 row) -->
                            <div class="mb-4 flex gap-4">
                                <div class="w-1/2">
                                    <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                                    <input type="text" name="category" id="category" value="{{ old('category') }}"
                                        class="mt-1 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm"
                                        placeholder="Kategori" required>
                                </div>

                                <div class="w-1/2">
                                    <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                                    <select name="level" id="level"
                                        class="mt-1 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm"
                                        required>
                                        <option value="">-- Pilih Level --</option>
                                        <option value="basic" {{ old('level') == 'basic' ? 'selected' : '' }}>Basic</option>
                                        <option value="intermediate" {{ old('level') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                                        <option value="advanced" {{ old('level') == 'advanced' ? 'selected' : '' }}>Advanced</option>
                                    </select>
                                </div>
                            </div>

                            <!-- End Date & Start Date (2 in 1 row) -->
                            <div class="mb-4 flex gap-4">
                                <div class="w-1/2">
                                    <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                                    <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}"
                                        class="mt-1 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm"
                                        required>
                                </div>
                                <div class="w-1/2">
                                    <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                                    <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}"
                                        class="mt-1 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm"
                                        required>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="flex justify-end space-x-2 mt-6">
                                <a href="{{ route('datakursus.index') }}"
                                    class="bg-gray-200 text-gray-700 px-4 text-sm py-2 rounded hover:bg-gray-300 transition">Batal</a>
                                <button type="submit" class="bg-indigo-600 text-sm text-white px-4 py-2 rounded hover:bg-indigo-700 transition">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
