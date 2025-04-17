<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto p-6">

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                            <!-- Card for Total Post -->


                            <!-- Card for Total Product -->
                            <div class="bg-white dark:bg-gray-700 shadow-lg rounded-lg p-6 flex items-center justify-between">
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-200">Total Jadwal</h3>
                                    <p class="text-2xl font-bold text-green-600 dark:text-green-400">{{ $coursesCount }}</p>
                                </div>
                                <div class="bg-green-100 dark:bg-green-600 p-3 rounded-full">
                                    <i class="fas fa-cogs text-green-600 dark:text-green-300"></i>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>