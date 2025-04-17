<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('datakursus.index', compact('courses'));
    }

    public function welcome()
    {
        $courses = Course::all();
        return view('user.kursus.listkursus', compact('courses'));
    }

    public function total()
    {
        // Menghitung jumlah post dan produk
        $coursesCount = Course::count();

        // Mengirimkan data jumlah post dan produk ke view
        return view('dashboard', compact('coursesCount'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('datakursus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:100',
            'level' => 'required|string|max:100',
            'price' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Course::create($validated);

        return redirect()->route('datakursus.index')->with('message', 'Course berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('user.kursus.detail', compact('course'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        // Menampilkan halaman edit dengan membawa data kursus
        return view('datakursus.update', compact('course'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'level' => 'required|in:basic,intermediate,advanced',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $course->update([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'category' => $request->category,
            'level' => $request->level,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('datakursus.index')->with('message', 'Data kursus berhasil diupdate.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('datakursus.index')->with('message', 'Kursus berhasil dihapus.');
    }
}
