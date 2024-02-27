<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $name = Auth::user()->name;
        $role = Auth::user()->role;
        $subjects = Subject::orderBy('created_at', 'desc')->get();

        // dd($role);
        return view('subject.index', compact('subjects', 'name', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $name = Auth::user()->name;
        $role = Auth::user()->role;
        return view('subject.create', compact('name', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_subject'=>'required'
        ]);

        $response = Subject::create([
            'name_subject' => $request->name_subject,
        ]);
        if ($response) {
            return redirect()->route('subject.index')->with('success', 'Subject created successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $name = Auth::user()->name;
        $role = Auth::user()->role;
        $subjectDetail = Subject::find($id);
        return view('subject.show', compact('subjectDetail', 'name', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $name = Auth::user()->name;
        $role = Auth::user()->role;
        $subjectDetail = Subject::find($id);
        return view('subject.edit', compact('subjectDetail', 'name', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name_subject'=>'required'
        ]);

        $updateSubject = Subject::find($id);
        $response = $updateSubject->update([
            'name_subject' => $request->name_subject,
        ]);

        if ($response) {
            return redirect()->route('subject.index')->with('success', 'Subject updated successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteSubject = Subject::find($id);
        $response = $deleteSubject->delete();
        if ($response) {
            return redirect()->route('subject.index')->with('success', 'Subject deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}
