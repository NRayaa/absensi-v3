<?php

namespace App\Http\Controllers;

use App\Models\Present;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    function admin(){

        $totalSubject = Subject::count();
        $totalTeacher = Teacher::count();
        $name = Auth::user()->name;
        $role = Auth::user()->role;
        $totalPresent = Present::where('attend_p', 'Hadir')->count();
        $totalAbsent = Present::where('attend_p', 'Tidak Hadir')->count();
        $recentActivity = Present::orderBy('created_at', 'desc')->take(5)->get();

        // dd($totalSubject);

        return view('welcome', compact('totalSubject', 'totalTeacher', 'totalPresent', 'totalAbsent', 'recentActivity', 'name', 'role'));
    }

    function guru(){
        return view('presteacher.index');
    }
}
