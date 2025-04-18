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
                    <div class="flex flex-col sm:flex-row gap-2">
                        <a href="{{ route('datakursus.show', $course->id) }}"
                            class="flex-1 text-center bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 text-sm font-medium transition duration-200">
                            Detail
                        </a>

                        <form action="{{ route('enrollments.store') }}" method="POST" class="flex-1">
                            @csrf
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <button type="submit"
                                class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 text-sm font-medium transition duration-200">
                                Daftar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>


<section id="testimoni" class="bg-gray-50 py-20 px-8">
    <h2 class="text-2xl font-bold mb-12 text-center text-gray-800">Apa Kata Mereka?</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 max-w-7xl mx-auto">
        @foreach ($testimonials as $testimonial)
        <div class="bg-white rounded-2xl shadow-md p-6 space-y-4">
            <p class="text-gray-600 italic">“{{ $testimonial->content }}”</p>
            <div class="flex items-center space-x-4">
                <!-- Gambar default placeholder -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>

                <div>
                    <p class="font-semibold text-gray-800">{{ $testimonial->username ?? $testimonial->user->name }}</p>
                    <p class="text-sm text-gray-500">{{ $testimonial->course->title }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>


<!-- FORM TESTIMONI -->
<div class="mt-8 p-6 bg-white rounded-lg shadow-md max-w-xl mx-auto">
    <h2 class="text-xl font-semibold mb-4 text-gray-800">Tulis Testimoni Anda</h2>

    @if (session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-md">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('testimonials.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Hidden: ID Kursus -->
        <input type="hidden" name="course_id" value="{{ $course->id }}">

        <!-- Username: Otomatis Anonymous jika guest -->
        <input type="hidden" name="username" value="Anonymous">

        <!-- Isi Testimoni -->
        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">Testimoni</label>
            <textarea name="content" id="content" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required></textarea>
        </div>

        <!-- Rating -->
        <div>
            <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
            <select name="rating" id="rating" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">Pilih Rating</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }} Bintang</option>
                    @endfor
            </select>
        </div>

        <!-- Submit -->
        <div>
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md text-sm font-medium">
                Kirim Testimoni
            </button>
        </div>
    </form>
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

@endsection