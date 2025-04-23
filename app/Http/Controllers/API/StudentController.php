<?php

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return response()->json(Student::all());
    }

    public function show($id)
    {
        $student = Student::find($id);
        return response()->json($student);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:students',
        ]);
        
        $student = Student::create($request->all());
        return response()->json(['success' => true, 'data' => $student]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->update($request->all());
        return response()->json(['success' => true, 'data' => $student]);
    }

    public function destroy($id)
    {
        Student::destroy($id);
        return response()->json(['success' => true]);
    }
}