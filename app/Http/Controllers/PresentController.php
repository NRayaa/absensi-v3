<?php

namespace App\Http\Controllers;

use App\Exports\ExportPresent;
use App\Models\Present;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PresentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $name = Auth::user()->name;
        $role = Auth::user()->role;

        $presents = Present::orderBy('created_at', 'desc')->get();
        return view('present.index', compact('presents', 'name', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataSubject = Subject::all();
        $dataTeacher = Teacher::all();
        $name = Auth::user()->name;
        $role = Auth::user()->role;

        return view('present.create', compact('dataSubject', 'dataTeacher', 'name', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'teacher_p' => 'required',
            'attend_p' => 'required',
            'class_p' => 'required',
            'meet_p' => 'required',
            'date_p' => 'required',
            'subject_p' => 'required',
            'topic_p' => 'required',
            'student_p' => 'required',
            'student_s_p' => 'nullable',
            'student_i_p' => 'nullable',
            'student_a_p' => 'nullable',
            'student_s_k_p' => 'nullable',
            'student_i_k_p' => 'nullable',
            'student_a_k_p' => 'nullable',
        ]);

        Present::create([
            'teacher_p' => $request->teacher_p,
            'attend_p' => $request->attend_p,
            'class_p' => $request->class_p,
            'meet_p' => $request->meet_p,
            'date_p' => $request->date_p,
            'subject_p' => $request->subject_p,
            'topic_p' => $request->topic_p,
            'student_p' => $request->student_p,
            'student_s_p' => $request->student_s_p,
            'student_i_p' => $request->student_i_p,
            'student_a_p' => $request->student_a_p,
            'student_s_k_p' => $request->student_s_k_p,
            'student_i_k_p' => $request->student_i_k_p,
            'student_a_k_p' => $request->student_a_k_p,
        ]);

        return redirect()->route('present.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $name = Auth::user()->name;
        $role = Auth::user()->role;
        $detailPresent = Present::find($id);
        return view('present.show', compact('detailPresent', 'name', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detailPresent = Present::find($id);
        $name = Auth::user()->name;
        $role = Auth::user()->role;
        return view('present.edit', compact('detailPresent', 'name', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'teacher_p' => 'required',
            'attend_p' => 'required',
            'class_p' => 'required',
            'meet_p' => 'required',
            'date_p' => 'required',
            'subject_p' => 'required',
            'topic_p' => 'required',
            'student_p' => 'required',
            'student_s_p' => 'nullable',
            'student_i_p' => 'nullable',
            'student_a_p' => 'nullable',
            'student_s_k_p' => 'nullable',
            'student_i_k_p' => 'nullable',
            'student_a_k_p' => 'nullable',
        ]);

        $updatePresent = Present::find($id);

        $updatePresent->update([
            'teacher_p' => $request->teacher_p,
            'attend_p' => $request->attend_p,
            'class_p' => $request->class_p,
            'meet_p' => $request->meet_p,
            'date_p' => $request->date_p,
            'subject_p' => $request->subject_p,
            'topic_p' => $request->topic_p,
            'student_p' => $request->student_p,
            'student_s_p' => $request->student_s_p,
            'student_i_p' => $request->student_i_p,
            'student_a_p' => $request->student_a_p,
            'student_s_k_p' => $request->student_s_k_p,
            'student_i_k_p' => $request->student_i_k_p,
            'student_a_k_p' => $request->student_a_k_p,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deletePresent = Present::find($id);
        $deletePresent->delete();
        return redirect()->route('present.index');
    }

    function exportpresent()
    {
        return Excel::download(new ExportPresent, "PresensiSMP.xlsx");
    }
}
