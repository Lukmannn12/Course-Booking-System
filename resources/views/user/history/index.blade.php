@extends('user.layouts.app')

@section('content')
@include('user.navbar.index')

<div class="mx-auto px-4 sm:px-6 lg:px-8 py-32 sm:py-12 lg:py-32">
    <h2 class="text-3xl font-bold text-gray-900 mb-6">Riwayat Kursus Saya</h2>

    <div class="space-y-6">
        @foreach ($enrollments as $enrollment)
        <div class="bg-white border rounded-lg p-6 shadow-sm">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                <div class="space-y-2">
                    <!-- Menampilkan judul kursus dari data kursus yang terkait -->
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-800">{{ $enrollment->course->title }}</h3>
                    <p class="text-sm text-gray-600">Kategori: {{ $enrollment->course->category }}</p>
                    <p class="text-sm text-gray-600">Tingkat: {{ $enrollment->course->level }}</p>
                    <p class="text-sm text-gray-600">
                        Periode: {{ \Carbon\Carbon::parse($enrollment->course->start_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($enrollment->course->end_date)->format('d M Y') }}
                    </p>

                    <div class="flex flex-wrap items-center gap-3 pt-2 text-sm">
                        <!-- Status kursus -->
                        @if($enrollment->status == 'belum_dimulai')
                        <span class="px-3 py-1 rounded-full text-white text-sm font-semibold bg-red-500">
                            Belum Dimulai
                        </span>
                        @elseif($enrollment->status == 'berlangsung' || $enrollment->status == 'selesai')
                        <span class="px-3 py-1 rounded-full text-white text-sm font-semibold bg-green-500">
                            {{ \Illuminate\Support\Str::headline($enrollment->status) }}
                        </span>
                        @elseif($enrollment->status == 'dibatalkan')
                        <span class="px-3 py-1 rounded-full text-white text-sm font-semibold bg-gray-500">
                            Dibatalkan
                        </span>
                        @else
                        <span class="px-3 py-1 rounded-full text-white text-sm font-semibold bg-gray-300">
                            Tidak Diketahui
                        </span>
                        @endif

                        <!-- Status Pembayaran -->
                        @if($enrollment->payment_status == 'belum_bayar')
                        <span class="px-3 py-1 rounded-full text-white text-sm font-semibold bg-red-500">
                            Belum Bayar
                        </span>
                        @elseif($enrollment->payment_status == 'sudah_bayar')
                        <span class="px-3 py-1 rounded-full text-white text-sm font-semibold bg-green-500">
                            Sudah Bayar
                        </span>
                        @else
                        <span class="px-3 py-1 rounded-full text-white text-sm font-semibold bg-gray-300">
                            Status Pembayaran Tidak Diketahui
                        </span>
                        @endif
                    </div>

                </div>
                <!-- Menampilkan harga kursus -->
                <div class="text-right mt-4 sm:mt-0 lg:mt-6 sm:text-left lg:text-right">
                    <p class="text-sm sm:text-lg md:text-xl font-bold text-gray-900">Rp {{ number_format($enrollment->course->price, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    
</div>
@endsection