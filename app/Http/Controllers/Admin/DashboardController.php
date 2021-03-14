<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\PracticeBase;
use App\Models\PracticeUnit;
use DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function registeredUser()
    {
        $users = User::all();
        //$courses = Course::all();
        $courses = DB::table("courses")->get();
        //$specialities = Speciality::all();
        $specialities = DB::table("specialities")->get();
        //dd($specialities);

        return view('admin.register')->with('users', $users)->with('courses', $courses)->with('specialities', $specialities);

    }

        public function editRegisterUser(Request $request, $id)
    {
        $users= User::findOrFail($id);
        $courses = Course::select('id', 'nimi')->get();
        //$courses = Course::select('id', 'nimi')->get();
        //$specialities = Speciality::select('id', 'nimi')->get();
        $specialities = DB::table("specialities")->get();

        //dd($specialities);
        //return view('admin.edit-register-user', compact('users', 'specialities', 'courses'));
        return view('admin.edit-register-user')->with('users', $users)->with('courses', $courses)->with('specialities', $specialities);
    }

    public function updateRegisterUser(Request $request, $id)
    {
        $users = User::with('practiceBases', 'practiceUnits', 'practiceDepartments', 'baseUnitDepartments', 'specialities', 'courses')->find($id);
        $users->name = $request->name;
        $users->phone = $request->phone;
        $users->email = $request->email;
        $users->usertype = $request->usertype;
        $users->position = $request->position;
        $users->course_id = $request->course_id;

        $users->update();

        return redirect('/role-register')->with('user_updated', 'Kasutaja andmed edukalt uuendatud');
    }
    public function getUserById($id)
    {
        $users = User::where('id', $id)->first();
        $courses = Course::where('id', $id)->first();
        return view('admin.singleUser', compact('users', 'courses'));
    }

    public function deleteRegisterUser($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/role-register')->with('user_deleted', 'Kasutaja andmed kustutatud');
    }
    public function deleteAllUsers(Request $request)
    {
        $ids = $request->ids;
        DB::table("users")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Kõik valitud kirjed kustutatud andmebaasist."]);
    }

    public function speciality()
    {
        $users = User::all();

        $specialities = DB::table("specialities")->pluck('nimi','id');
        //dd($specialities);
        //return back()->with('courseSpeciality.dropdown',compact('specialities', 'users'));
        return view('auth.index',compact('specialities')); // Juhul kui panna lisa function register blade'i
    }

    public function course_id($id)
    {
        $course_id = DB::table("courses")
            ->where("speciality_id",$id)
            ->pluck('nimi','id');
        return json_encode($course_id);
    }

    //Student

    public function student()
    {
        $users = User::find(Auth::user()->id);
        //dd($students);
        return view('student.home-student', compact('users'));
    }
    public function admin()
    {
        $count = DB::table('users')->count();
        $students = DB::table('users')
            ->where('usertype', '=', 'student')
            ->count();
        $practiceBaseInstructor = DB::table('users')
            ->where('usertype', '=', 'practiceBaseInstructor')
            ->count();
        $schoolInstructor = DB::table('users')
            ->where('usertype', '=', 'schoolInstructor')
            ->count();
        $practiceBase = DB::table('practice_bases')->count();
        $practiceUnit = DB::table('practice_units')->count();
        $practiceDepartment = DB::table('practice_departments')->count();

        $speciality = DB::table('specialities')->count();
        $course = DB::table('courses')->count();

        //dd($count);
        return view('admin.dashboard', compact('count', 'students', 'practiceBaseInstructor', 'schoolInstructor','practiceBase', 'practiceUnit', 'practiceDepartment', 'speciality', 'course'));
    }

}
