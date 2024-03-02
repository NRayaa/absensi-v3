<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PmsteacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $name = Auth::user()->name;
        $role = Auth::user()->role;
        $pmsTeacher = Permission::where('teacher_pms', $name)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pmsteacher.index', compact('pmsTeacher', 'name', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $name = Auth::user()->name;
        $role = Auth::user()->role;
        return view('pmsteacher.create', compact('name', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name=Auth::user()->name;
        $this->validate($request, [
            'purpose_pms'=>'required',
            'date_pms'=>'required',
            'time_pms'=>'required',
            'subject_pms'=>'required',
            'desc_pms'=>'required',
        ]);

        Permission::create([
            'teacher_pms' => $name,
            'purpose_pms' => $request->purpose_pms,
            'date_pms' => $request->date_pms,
            'time_pms' => $request->time_pms,
            'subject_pms' => $request->subject_pms,
            'desc_pms' => $request->desc_pms,
        ]);

        return redirect()->route('pmsteacher.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $name=Auth::user()->name;
        $role=Auth::user()->role;
        $pmsDetail=Permission::find($id);
        return view('pmsteacher.show', compact('pmsDetail', 'name', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('pmsteacher.index');
    }
}
