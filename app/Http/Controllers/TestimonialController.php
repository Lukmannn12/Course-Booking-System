<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
        $testimonials = Testimonial::all();
        return view('datatestimonial.index', compact('testimonials'));

     }


    public function home()
    {
        $enrollments = Enrollment::with('course')
        ->where('user_id', Auth::id())
        ->latest()
        ->get();

    $testimonials = Testimonial::with(['user', 'course'])->latest()->get();

    return view('user.kursus.listkursus', compact('enrollments', 'testimonials'));
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
            'content' => 'required|string|max:1000',
            'rating' => 'nullable|integer|min:1|max:5',
            'username' => 'nullable|string|max:100', // hanya jika tidak login
        ]);
    
        $userId = Auth::id(); // ambil ID user kalau login
    
        Testimonial::create([
            'user_id'   => $userId,
            'course_id' => $request->course_id,
            'username'  => $userId ? Auth::user()->name : ($request->username ?? 'Anonymous'),
            'content'   => $request->content,
            'rating'    => $request->rating,
        ]);
    
        return back()->with('success', 'Testimoni berhasil dikirim!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        //
    }
}
