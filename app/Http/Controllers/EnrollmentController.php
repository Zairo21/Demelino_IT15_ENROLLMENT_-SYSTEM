<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    // Show enrollment form
    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        return view('enrollments.create', compact('students', 'courses'));
    }

    // Process enrollment
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id'
        ]);

        $student = Student::findOrFail($request->student_id);
        $course = Course::findOrFail($request->course_id);

        // Check if already enrolled
        if ($student->courses()->where('course_id', $course->id)->exists()) {
            return redirect()->back()->with('error', 'Student is already enrolled in this course!');
        }

        // Check course capacity
        if ($course->students()->count() >= $course->capacity) {
            return redirect()->back()->with('error', 'Course is at full capacity!');
        }

        // Enroll student
        $student->courses()->attach($course->id);

        return redirect()->route('students.show', $student->id)
                        ->with('success', 'Student enrolled successfully!');
    }
}