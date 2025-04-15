<?php

namespace App\Http\Controllers\admin_vemoni;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::latest();

        if (!empty($request->get('keyword'))) {
            $students = $students->where('name', 'like', '%' . $request->get('keyword') . '%');
        }

        $students = $students->paginate(5);

        return view('admin_vemoni.student_vemoni.list', compact('students'));
    }

    public function create()
    {
        return view('admin_vemoni.student_vemoni.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->passes()) {
            $student = new Student();
            $student->name = $request->name;
            $student->groupId = $request->groupId;
            $student->save();

            $request->session()->flash('success', 'Student added successfully!');

            return response()->json([
                'status' => true,
                'message' => 'Student added successfully!'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function view($studentId, Request $request)
    {
        $student = Student::find($studentId);

        if (empty($student)) {
            return redirect()->route('students.index');
        }

        return view('admin_vemoni.student_vemoni.view', compact('student'));
    }

    public function edit($studentId, Request $request)
    {
        $student = Student::find($studentId);

        if (empty($student)) {
            return redirect()->route('students.index');
        }

        return view('admin_vemoni.student_vemoni.edit', compact('student'));
    }

    public function update($studentId, Request $request)
    {
        $student = Student::find($studentId);

        if (empty($student)) {
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'Student not found!'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->passes()) {
            $student->name = $request->name;
            $student->groupId = $request->groupId;
            $student->save();

            $request->session()->flash('success', 'Student updated successfully!');

            return response()->json([
                'status' => true,
                'message' => 'Student updated successfully!'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function destroy($studentId, Request $request)
    {
        $student = Student::find($studentId);

        if (empty($student)) {
            return redirect()->route('students.index');
        }

        $student->delete();

        $request->session()->flash('success', 'Student deleted successfully!');

        return response()->json([
            'status' => true,
            'message' => 'Student deleted successfully!'
        ]);
    }
}
