<?php

namespace App\Http\Controllers;

use App\Models\Majors;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('major')->get();
        return view('students.index', compact('students'));
    }

    public function show(string $id)
    {
        $student = Student::with('major')->findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function create()
    {
        $majors = Majors::all();
        return view('students.create', compact('majors'));
    }

    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        $majors = Majors::all();
        return view('students.edit', compact('student', 'majors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required',
            'student_id_number' => 'required|unique:students,student_id_number',
            'email'             => 'required|email',
            'gender'            => 'required',
            'majors'            => 'required',
            'status'            => 'required',
        ]);

        Student::create([
            'name'              => $request->name,
            'student_id_number' => $request->student_id_number,
            'email'             => $request->email,
            'phone_number'      => $request->phone_number,
            'birth_date'        => $request->birth_date,
            'gender'            => $request->gender,
            'major_id'          => $request->majors,
            'status'            => $request->status,
        ]);

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'              => 'required',
            'student_id_number' => 'required',
            'email'             => 'required|email',
            'gender'            => 'required',
            'majors'            => 'required',
            'status'            => 'required',
        ]);

        $student = Student::findOrFail($id);
        $student->update([
            'name'              => $request->name,
            'student_id_number' => $request->student_id_number,
            'email'             => $request->email,
            'phone_number'      => $request->phone_number,
            'birth_date'        => $request->birth_date,
            'gender'            => $request->gender,
            'major_id'          => $request->majors,
            'status'            => $request->status,
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(string $id)
    {
        Student::findOrFail($id)->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class StudentController extends Controller
// {
    // modul 3
    // public function index(): string
    // {
    //     return 'Students data...';
    // }

    // public function show(string $id): string
    // {
    //     return 'Student ID: ' . $id;
    // }

    // public function create(): string
    // {
    //     return 'Create student data';
    // }

    // modul 4
//     public function index()
//     {
//         return view('students.index');
//     }

//     public function show(string $id)
//     {
//         return view('students.show');
//     }

//     public function create()
//     {
//         return view('students.create');
//     }

//     public function edit(string $id)
//     {
//         return view('students.edit');
//     }
// }