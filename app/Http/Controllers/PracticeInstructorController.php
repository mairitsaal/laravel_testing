<?php

namespace App\Http\Controllers;

use App\Models\PracticeInstructor;
use App\Models\PracticeUnit;
use Illuminate\Http\Request;

class PracticeInstructorController extends Controller
{
    public function addPracticeInstructor()
    {
        return view('practiceInstructor.add-practice-instructor');
    }
    public function createPracticeInstructor(Request $request)
    {
        $practiceInstructor = new PracticeInstructor();
        $practiceInstructor->nimi = $request->nimi;
        $practiceInstructor->amet = $request->amet;
        $practiceInstructor->email = $request->email;
        $practiceInstructor->save();
        return back()->with('practiceInstructor_created', 'Praktikajuhendaja on lisatud andmebaasi');
    }

    public function getPracticeInstructor()
    {
        $practiceInstructors = PracticeInstructor::orderBy('id', 'ASC')->get();
        return view('practiceInstructor.practiceInstructors', compact('practiceInstructors'));
    }
}
