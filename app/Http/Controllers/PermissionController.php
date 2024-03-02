<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $name = Auth::user()->name;
        $role = Auth::user()->role;

        $permissions = Permission::orderBy('created_at', 'desc')->get();
        return view('permission.index', compact('permissions', 'name', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $name = Auth::user()->name;
        $role = Auth::user()->role;
        $dataTeacher = Teacher::all();
        return view('permission.create', compact('dataTeacher', 'name', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'teacher_pms'=>'required',
            'date_pms'=>'required',
            'time_pms'=>'required',
            'purpose_pms'=>'required',
            'subject_pms'=>'required',
            'desc_pms'=>'required',
        ]);

        Permission::create([
            'teacher_pms' => $request->teacher_pms,
            'date_pms' => $request->date_pms,
            'time_pms' => $request->time_pms,
            'purpose_pms' => $request->purpose_pms,
            'subject_pms' => $request->subject_pms,
            'desc_pms' => $request->desc_pms,
        ]);
        return redirect()->route('permission.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $name = Auth::user()->name;
        $role = Auth::user()->role;
        $permission = Permission::find($id);
        return view('permission.show', compact('permission', 'name', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $name = Auth::user()->name;
        $role = Auth::user()->role;
        $permission = Permission::find($id);
        return view('permission.edit', compact('permission', 'name', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'teacher_pms'=>'required',
            'date_pms'=>'required',
            'purpose_pms'=>'required',
            'subject_pms'=>'required',
            'desc_pms'=>'required',
        ]);

        $updatePms = Permission::find($id);
        $updatePms->update([
            'teacher_pms' => $request->teacher_pms,
            'date_pms' => $request->date_pms,
            'purpose_pms' => $request->purpose_pms,
            'subject_pms' => $request->subject_pms,
            'desc_pms' => $request->desc_pms,
        ]);

        return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deletePms = Permission::find($id);
        $deletePms->delete();
        return redirect()->route('permission.index');
    }
}
