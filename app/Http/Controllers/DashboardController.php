<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCourses = Course::count();
        $totalEnrollments = Enrollment::count();
        $totalUsers = User::where('role','user')->count();
        $totalCompletedEnrollments = Enrollment::where('payment_status','sudah_bayar')
                                                ->where('status','selesai')
                                                ->count();                            

        return view('dashboard', compact('totalCourses', 'totalEnrollments', 'totalUsers','totalCompletedEnrollments', 'statusCounts'));
    }
}
