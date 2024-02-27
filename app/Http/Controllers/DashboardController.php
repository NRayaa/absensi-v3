<?php

namespace App\Http\Controllers;

use App\Models\Present;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    function admin(){

        $totalSubject = Subject::count();
        $totalTeacher = Teacher::count();
        $totalPresent = Present::where('attend_p', 'Hadir')->count();
        $totalAbsent = Present::where('attend_p', 'Tidak Hadir')->count();
        $recentActivity = Present::orderBy('created_at', 'desc')->take(5)->get();

        // dd($totalSubject);

        return view('welcome', compact('totalSubject', 'totalTeacher', 'totalPresent', 'totalAbsent', 'recentActivity'));
    }

    function guru(){
        return view('presteacher.index');
    }
}
