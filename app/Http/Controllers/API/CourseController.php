<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Get all courses with students
    public function index()
    {
        return Course::with('students')->get();
    }

    // Create a new course
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $course = Course::create($request->only('name', 'description'));

        return response()->json($course, 201);
    }

    // Show a specific course with students
    public function show(Course $course)
    {
        return $course->load('students');
    }

    // Update a course's information
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $course->update($request->only('name', 'description'));

        return response()->json($course);
    }

    // Delete a course
    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json(['message' => 'Course deleted']);
    }
}