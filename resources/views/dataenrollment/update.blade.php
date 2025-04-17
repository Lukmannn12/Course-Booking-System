<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            <span>{{ __('Data Enrollment') }}</span>
            <i class="fa fa-arrow-right mx-2 text-sm"></i>
            <span>{{ __('Update') }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="p-2">
                        <h1 class="text-xl font-bold mb-4">Edit Data Enrollment</h1>

                        <!-- Form Edit Data Kursus -->
                        <form action="{{ route('enrollments.update', $enrollment) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Digunakan untuk method PUT karena ini untuk update -->
                            <!-- Status -->
                            <div class="mb-4 flex gap-4">
                                <div class="w-1/2">
                                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                    <select name="status" id="status" required
                                        class="mt-1 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                                        <option value="belum_dimulai" {{ $enrollment->status == 'belum_dimulai' ? 'selected' : '' }}>Belum Dimulai</option>
                                        <option value="berlangsung" {{ $enrollment->status == 'berlangsung' ? 'selected' : '' }}>Berlangsung</option>
                                        <option value="selesai" {{ $enrollment->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                        <option value="dibatalkan" {{ $enrollment->status == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                    </select>
                                </div>
                                <div class="w-1/2">
                                    <label for="payment_status" class="block text-sm font-medium text-gray-700">Status Pembayaran</label>
                                    <select name="payment_status" id="payment_status" required
                                        class="mt-1 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                                        <option value="belum_bayar" {{ $enrollment->payment_status == 'belum_bayar' ? 'selected' : '' }}>Belum Bayar</option>
                                        <option value="sudah_bayar" {{ $enrollment->payment_status == 'sudah_bayar' ? 'selected' : '' }}>Sudah Bayar</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Buttons -->
                            <div class="flex justify-end space-x-2 mt-6">
                                <a href="{{ route('enrollments.index') }}"
                                    class="bg-gray-200 text-gray-700 px-4 text-sm py-2 rounded hover:bg-gray-300 transition">Batal</a>
                                <button type="submit" class="bg-indigo-600 text-sm text-white px-4 py-2 rounded hover:bg-indigo-700 transition">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>