<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PracticeBase;
use App\Models\Course;
use App\Models\Speciality;
use DB;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function registeredUser()
    {
        $users = User::all();
        $courses = Course::all();
        $specialities = Speciality::all();
        return view('admin.register')->with('users', $users)->with('courses', $courses)->with('specialities', $specialities);
    }

        public function editRegisterUser(Request $request, $id)
    {
        $users= User::findOrFail($id);
        return view('admin.edit-register-user')->with('users', $users);
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

        $specialities = DB::table("specialities")->pluck('nimi','id');
        return view('auth.index',compact('specialities'));
    }

    public function course($id)
    {
        $courses = DB::table("courses")
            ->where("speciality_id",$id)
            ->pluck('nimi','id');
        return json_encode($courses);
    }




}
