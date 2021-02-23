<?php

namespace App\Http\Controllers;

use App\Models\PracticeInstructor;
use App\Models\User;

use Illuminate\Http\Request;

class PracticeInstructorController extends Controller
{
    public function addPracticeInstructor()
    {
        return view('practiceInstructor.add-practice-instructor');
    }
    public function createPracticeInstructor(Request $request)
    {
    //    $practiceInstructor = new PracticeInstructor();
    //    $practiceInstructor->name = $request->name;
    //    $practiceInstructor->phone = $request->phone;
    //    $practiceInstructor->position = $request->position;
    //    $practiceInstructor->email = $request->email;
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->usertype = $request->usertype;

        $user->save();

        $practiceInstructor = new PracticeInstructor();
        $practiceInstructor->practice_instructor_id = $request->practice_instructor_id;
        $practiceInstructor->position = $request->position;
        $practiceInstructor->save();


        return back()->with('practiceInstructor_created', 'Praktikajuhendaja on lisatud andmebaasi');
    }

    public function getPracticeInstructor()
    {
        $practiceInstructors = PracticeInstructor::with('user', 'practiceBase', 'practiceUnit', 'practiceDepartment')->orderBy('id', 'ASC')->get();
       // $practiceInstructors = PracticeInstructor::whereHas(
       //     'User', function($q){
       //    $q->where('usertype', 'practiceBaseInstructor');
        //}
        //)->get();

        return view('practiceInstructor.practiceInstructors', compact('practiceInstructors'));
    }
}
