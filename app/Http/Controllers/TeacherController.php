<?php

namespace App\Http\Controllers;

use App\Exports\ExportTeachpres;
use App\Models\Present;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $name = Auth::user()->name;
        $role = Auth::user()->role;
        $teachers = Teacher::where('id', '!=', 1)
                    ->orderBy('created_at', 'desc')
                    ->get();
        return view('teacher.index', compact('teachers', 'name', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $name = Auth::user()->name;
        $role = Auth::user()->role;
        return view('teacher.create', compact('name', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_teacher' => 'required',
            'email_teacher' => 'required',
            'password_teacher' => 'required',
        ]);

        $response = Teacher::create([
            'name_teacher' => $request->name_teacher,
        ]);

        User::create([
            'name' => $request->name_teacher,
            'email' => $request->email_teacher,
            'password' => bcrypt($request->password_teacher),
            'role' => 'guru',
        ]);

        if ($response) {
            return redirect()->route('teacher.index')->with('success', 'Teacher created successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $name = Auth::user()->name;
        $role = Auth::user()->role;
        $teacherDetail = Teacher::find($id);
        $teacherName = Teacher::find($id)->name_teacher;
        $teacherPresent = Present::where('teacher_p', $teacherName)->get();
        $present = $teacherPresent->where('attend_p', 'Hadir')->count();
        $absent = $teacherPresent->where('attend_p', 'Tidak hadir')->count();

        // dd($teacherName);
        return view('teacher.show', compact('teacherDetail', 'teacherName', 'teacherPresent', 'present', 'absent', 'name', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacherDetail = Teacher::find($id);
        $userDetail = User::find($id);
        $name = Auth::user()->name;
        $role = Auth::user()->role;
        return view('teacher.edit', compact('teacherDetail', 'userDetail', 'name', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name_teacher' => 'required',
            'email_teacher' => 'required',
            'password_teacher' => 'required',
        ]);

        $updateTeacher = Teacher::find($id);
        $response = $updateTeacher->update([
            'name_teacher' => $request->name_teacher,
        ]);

        User::find($id)->update([
            'name' => $request->name_teacher,
            'email' => $request->email_teacher,
            'password' => bcrypt($request->password_teacher),
            'role' => 'guru',
        ]);

        if ($response) {
            return redirect()->route('teacher.index')->with('success', 'Teacher updated successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteTeacher = Teacher::find($id);
        $response = $deleteTeacher->delete();
        User::find($id)->delete();

        if ($response) {
            return redirect()->route('teacher.index')->with('success', 'Teacher deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function export(string $id)
    {
        return Excel::download(new ExportTeachpres($id), 'teacher_report.xlsx');
    }
}
