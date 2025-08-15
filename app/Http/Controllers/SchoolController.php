<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Assignment;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Inertia\Inertia;

class SchoolController extends Controller
{
    /**
     * Display the main school dashboard.
     */
    public function index()
    {
        $stats = [
            'total_students' => Student::count(),
            'total_teachers' => Teacher::count(),
            'total_classes' => SchoolClass::count(),
            'total_subjects' => Subject::count(),
            'active_assignments' => Assignment::where('status', 'published')
                ->where('due_date', '>', now())
                ->count(),
        ];

        $recentAnnouncements = Announcement::with('user')
            ->published()
            ->latest('published_at')
            ->limit(5)
            ->get();

        $upcomingAssignments = Assignment::with(['subject', 'teacher.user', 'schoolClass'])
            ->published()
            ->where('due_date', '>', now())
            ->orderBy('due_date', 'asc')
            ->limit(10)
            ->get();

        return Inertia::render('school/dashboard', [
            'stats' => $stats,
            'recentAnnouncements' => $recentAnnouncements,
            'upcomingAssignments' => $upcomingAssignments,
        ]);
    }
}