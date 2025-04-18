<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Testimonial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="p-2">
                        <h1 class="text-xl font-bold mb-4">Manajemen Data Testimonial</h1>

                        <div class="overflow-x-auto">
                            <table class="min-w-full table-auto border-collapse mt-4 text-sm text-center">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border p-2">Id</th>
                                        <th class="border p-2">Content</th>
                                        <th class="border p-2">Username</th>
                                        <th class="border p-2">Rating</th>
                                        <th class="border p-2">Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testimonials as $testimonial)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border p-2">{{ $testimonial->id }}</td>
                                        <td class="border p-2">{{ $testimonial->content }}</td>
                                        <td class="border p-2">{{ $testimonial->username ?? $testimonial->user->name }}</td>
                                        <td class="border p-2 flex items-center justify-center">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <!-- Cek apakah rating lebih besar atau sama dengan $i, jika ya tampilkan bintang penuh, jika tidak tampilkan bintang kosong -->
                                                <svg class="w-5 h-5 {{ $testimonial->rating >= $i ? 'text-yellow-400' : 'text-gray-300' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 17.27l6.18 3.73-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73-1.64 7.03L12 17.27z" />
                                                </svg>
                                                @endfor
                                        </td>
                                        <td class="border p-2">{{ $testimonial->course->title }}</td>

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

</x-app-layout>