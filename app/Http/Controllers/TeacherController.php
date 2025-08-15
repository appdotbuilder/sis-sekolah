<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::with('user')
            ->active()
            ->latest()
            ->paginate(20);

        return Inertia::render('school/teachers', [
            'teachers' => $teachers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('teachers/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Implementation for storing teacher
        return redirect()->route('teachers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        $teacher->load(['user', 'schedules.subject', 'assignments']);
        
        return Inertia::render('teachers/show', [
            'teacher' => $teacher,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return Inertia::render('teachers/edit', [
            'teacher' => $teacher,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        // Implementation for updating teacher
        return redirect()->route('teachers.show', $teacher);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        
        return redirect()->route('teachers.index');
    }
}