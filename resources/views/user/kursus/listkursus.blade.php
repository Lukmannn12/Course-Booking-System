@extends('user.layouts.app')

@section('content')
@include('user.navbar.index')

<div class="px-6 py-20 lg:px-8 bg-white">
    <!-- Main Hero Text -->
    <div class="mx-auto max-w-2xl py-20 sm:py-48 lg:py-56 text-center">
        <h1 class="text-5xl font-semibold tracking-tight text-gray-900 sm:text-7xl">
            Temukan Kursus Online yang Tepat untuk Anda
        </h1>
        <p class="mt-8 text-lg font-medium text-gray-500 sm:text-xl">
            Pilih dari berbagai kelas online yang disediakan oleh pengajar profesional. Tingkatkan keterampilan Anda di bidang yang Anda minati, kapan saja, dan di mana saja.
        </p>
    </div>
</div>

<section id="kursus" class="bg-blue-900 py-16 px-8 text-white">
    <h2 class="text-2xl font-bold mb-8 text-center">Kursus Tersedia</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 py-10">
        @foreach($courses as $course)
        <div class="max-w-sm bg-white rounded-2xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:rotate-1 hover:shadow-2xl hover:cursor-pointer">
            <div class="p-6 space-y-3">
                <h3 class="text-xl font-semibold text-gray-800">{{ $course->title }}</h3>
                <div class="text-sm text-gray-500 flex items-center space-x-2">
                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2v-7H3v7a2 2 0 002 2z" />
                    </svg>
                    <span>{{ \Carbon\Carbon::parse($course->start_date)->translatedFormat('d F Y') }} – {{ \Carbon\Carbon::parse($course->end_date)->translatedFormat('d F Y') }}</span>
                </div>
                <div class="text-sm text-gray-700 font-medium">
                    {{ $course->price == 0 ? 'Gratis' : 'Rp ' . number_format($course->price, 0, ',', '.') }}
                </div>
                <span class="inline-block bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">{{ $course->category }}</span>
                <div class="pt-4">
                    <a href="{{ route('datakursus.show', $course->id) }}" class="inline-block w-full text-center bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 text-sm font-medium transition duration-200">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>


<section id="testimoni" class="bg-gray-50 py-20 px-8">
    <h2 class="text-2xl font-bold mb-12 text-center text-gray-800">Apa Kata Mereka?</h2>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 max-w-7xl mx-auto">
        <!-- Testimoni 1 -->
        <div class="bg-white rounded-2xl shadow-md p-6 space-y-4">
            <p class="text-gray-600 italic">“Kursus ini sangat membantu saya dalam memahami materi yang sebelumnya sulit dipahami. Penjelasannya sangat jelas dan mudah diikuti.”</p>
            <div class="flex items-center space-x-4">
                <img src="https://i.pravatar.cc/100?img=1" alt="User 1" class="w-12 h-12 rounded-full">
                <div>
                    <p class="font-semibold text-gray-800">Andi Setiawan</p>
                    <p class="text-sm text-gray-500">Peserta Kursus Web Development</p>
                </div>
            </div>
        </div>

        <!-- Testimoni 2 -->
        <div class="bg-white rounded-2xl shadow-md p-6 space-y-4">
            <p class="text-gray-600 italic">“Saya sangat puas! Belajar jadi lebih fleksibel, bisa diakses kapan saja. Terima kasih atas platform yang luar biasa ini.”</p>
            <div class="flex items-center space-x-4">
                <img src="https://i.pravatar.cc/100?img=2" alt="User 2" class="w-12 h-12 rounded-full">
                <div>
                    <p class="font-semibold text-gray-800">Rina Marlina</p>
                    <p class="text-sm text-gray-500">Peserta Kursus UI/UX Design</p>
                </div>
            </div>
        </div>

        <!-- Testimoni 3 -->
        <div class="bg-white rounded-2xl shadow-md p-6 space-y-4">
            <p class="text-gray-600 italic">“Materinya lengkap, praktikal, dan langsung bisa diaplikasikan dalam pekerjaan saya. Recommended banget!”</p>
            <div class="flex items-center space-x-4">
                <img src="https://i.pravatar.cc/100?img=3" alt="User 3" class="w-12 h-12 rounded-full">
                <div>
                    <p class="font-semibold text-gray-800">Dewi Anggraini</p>
                    <p class="text-sm text-gray-500">Peserta Kursus Data Analysis</p>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
