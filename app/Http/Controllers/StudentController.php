<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Create sample data if none exists
        if (Student::count() === 0) {
            Student::factory(50)->create();
        }

        $students = Student::with(['user', 'schoolClass'])
            ->latest()
            ->paginate(20);

        $classes = SchoolClass::active()->get();

        return Inertia::render('school/students', [
            'students' => $students,
            'classes' => $classes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = SchoolClass::active()->get();
        
        return Inertia::render('students/create', [
            'classes' => $classes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Implementation for storing student
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student->load(['user', 'schoolClass', 'grades.subject']);
        
        return Inertia::render('students/show', [
            'student' => $student,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $classes = SchoolClass::active()->get();
        
        return Inertia::render('students/edit', [
            'student' => $student,
            'classes' => $classes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        // Implementation for updating student
        return redirect()->route('students.show', $student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        
        return redirect()->route('students.index');
    }
}