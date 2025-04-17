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
                            <!-- Card Total Jadwal -->
                            <div class="bg-white shadow-lg rounded-lg p-6 flex items-center justify-between hover:transform hover:scale-105 hover:shadow-xl transition-all cursor-pointer">
                                <div>
                                    <h3 class="text-xl font-semibold text-blue-600">Total Jadwal</h3>
                                    <p class="text-2xl font-bold text-blue-600 pt-4">{{ $totalCourses }}</p>
                                </div>
                                <div class="bg-blue-100 dark:bg-blue-600 p-3 rounded-full">
                                    <i class="fas fa-calendar-alt text-blue-600 dark:text-blue-300"></i>
                                </div>
                            </div>

                            <!-- Card Total Enrollment -->
                            <div class="bg-white shadow-lg rounded-lg p-6 flex items-center justify-between hover:transform hover:scale-105 hover:shadow-xl transition-all cursor-pointer">
                                <div>
                                    <h3 class="text-xl font-semibold text-teal-600">Total Enrollment</h3>
                                    <p class="text-2xl font-bold text-teal-600 pt-4">{{ $totalEnrollments }}</p>
                                </div>
                                <div class="bg-teal-100 dark:bg-teal-600 p-3 rounded-full">
                                    <i class="fas fa-user-plus text-teal-600 dark:text-teal-300"></i>
                                </div>
                            </div>

                            <!-- Card Total User -->
                            <div class="bg-white shadow-lg rounded-lg p-6 flex items-center justify-between hover:transform hover:scale-105 hover:shadow-xl transition-all cursor-pointer">
                                <div>
                                    <h3 class="text-xl font-semibold text-indigo-600">Total User</h3>
                                    <p class="text-2xl font-bold text-indigo-600 pt-4">{{ $totalUsers }}</p>
                                </div>
                                <div class="bg-indigo-100 dark:bg-indigo-600 p-3 rounded-full">
                                    <i class="fas fa-users text-indigo-600 dark:text-indigo-300"></i>
                                </div>
                            </div>

                            <!-- Card Total Enrollment Selesai dan Sudah Bayar -->
                            <div class="bg-white shadow-lg rounded-lg p-6 flex items-center justify-between hover:transform hover:scale-105 hover:shadow-xl transition-all cursor-pointer">
                                <div>
                                    <h3 class="text-xl font-semibold text-green-600">Total Enrollment Selesai dan Sudah Bayar</h3>
                                    <p class="text-2xl font-bold text-green-600 pt-4">{{ $totalCompletedEnrollments }}</p>
                                </div>
                                <div class="bg-green-100 dark:bg-green-600 p-3 rounded-full">
                                    <i class="fas fa-check-circle text-green-600 dark:text-green-300"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>