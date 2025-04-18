<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollments = Enrollment::all();
        return view('dataenrollment.index', compact('enrollments'));
    }

    public function history()
        {
            $enrollments = Enrollment::with('course')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

            return view('user.history.index', compact('enrollments'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        Enrollment::create([
            'user_id' => Auth::id(),
            'course_id' => $request->course_id,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        return view('dataenrollment.update', compact('enrollment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        $request->validate([
            'status' => 'required|in:belum_dimulai,berlangsung,selesai,dibatalkan',
            'payment_status' => 'required|in:belum_bayar,sudah_bayar',
        ]);
    
        $enrollment->update([
            'status' => $request->status,
            'payment_status' => $request->payment_status,
        ]);
    
        return redirect()->route('enrollments.index')->with('success', 'Data enrollment berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        //
    }
}
