@extends('user.layouts.app')

@section('content')
@include('user.navbar.index')

<div class="min-h-screen bg-gray-50 py-32 px-6 lg:px-8">
<div class="max-w-6xl mx-auto bg-white rounded-3xl shadow-lg overflow-hidden mt-10">
    <div class="p-8 space-y-8">
        <!-- Title -->
        <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">{{ $course->title }}</h1>

        <!-- Course Details Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Category -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6 rounded-xl shadow-lg text-white">
                <h2 class="text-lg font-semibold">Kategori</h2>
                <p class="text-md mt-2">{{ $course->category }}</p>
            </div>

            <!-- Level -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6 rounded-xl shadow-lg text-white">
                <h2 class="text-lg font-semibold">Tingkat</h2>
                <p class="text-md mt-2">{{ $course->level }}</p>
            </div>

            <!-- Price -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6 rounded-xl shadow-lg text-white">
                <h2 class="text-lg font-semibold">Harga</h2>
                <p class="text-md mt-2">
                    {{ $course->price == 0 ? 'Gratis' : 'Rp ' . number_format($course->price, 0, ',', '.') }}
                </p>
            </div>

            <!-- Schedule -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6 rounded-xl shadow-lg text-white">
                <h2 class="text-lg font-semibold">Jadwal</h2>
                <p class="text-md mt-2">
                    {{ \Carbon\Carbon::parse($course->start_date)->translatedFormat('d F Y') }} – 
                    {{ \Carbon\Carbon::parse($course->end_date)->translatedFormat('d F Y') }}
                </p>
            </div>
        </div>

        <!-- Description -->
        <div class="space-y-4 border-t pt-6 border-gray-200">
            <h2 class="text-2xl font-semibold text-gray-800">Deskripsi</h2>
            <p class="text-md text-gray-600 leading-relaxed">{{ $course->description }}</p>
        </div>

        <!-- Action Button -->
        <div class="mt-10 flex justify-center">
            <a href="/" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-2xl hover:bg-blue-700 transition-all duration-300 font-semibold text-base shadow-xl transform hover:scale-105">
                Kembali ke Daftar Kursus
            </a>
        </div>
    </div>
</div>



</div>


@endsection