<?php

namespace App\Http\Controllers;

use App\Models\BaseUnitDepartment;
use App\Models\PracticeBase;
use App\Models\PracticeDepartment;
use App\Models\PracticeUnit;
use DB;
use App\Models\Course;
use App\Models\SpecialityCourse;
use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityCourseController extends Controller
{
    public function addSpecialityCourse(Request $request)
    {
        $courses = Course::select('id', 'nimi')->get();
        $specialities = Speciality::select('id', 'nimi')->get();
        //$baseUnits = BaseUnits::select('practice_base_id','practice_unit_id')->get();
        $specialityCourses = SpecialityCourse::select('id', 'nimi')->get();

        return view('specialityCourses.add-course-to-speciality', compact('courses','specialities', 'specialityCourses'));
    }
    public function createSpecialityCourse(Request $request)
    {
        $specialityCourse = new SpecialityCourse();
        $specialityCourse->id = $request->id;
        $specialityCourse->speciality_id = $request->speciality_id;
        $specialityCourse->course_id = $request->course_id;
        $specialityCourse->save();

        return back()->with('specialityCourse_created', 'Kursus lisatud erialale');
    }
    public function getSpecialityCourse()
    {
        $specialityCourses = SpecialityCourse::all();
        $courses = Course::select('id', 'nimi')->get();
        $specialities = Speciality::select('id', 'nimi')->get();

        return view('specialityCourses.specialityCourses', compact('specialityCourses', 'courses', 'specialities'));
    }
    public function deleteSpecialityCourse($id)
    {
        SpecialityCourse::where('id', $id)->delete();
        return back()->with('specialityCourse_deleted', 'Seos eriala ja kursuse vahel kustutatud');
    }

    public function deleteAllSpecialityCourse(Request $request)
    {
        $ids = $request->ids;
        DB::table("speciality_courses")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Kõik seosed eriala ja kursuste vahel kustutatud"]);
    }
    public function editSpecialityCourse($id)
    {
        $specialityCourse = SpecialityCourse::all();
        $courses = Course::select('id', 'nimi')->get();
        $specialities = Speciality::select('id', 'nimi')->get();

        return view('specialityCourses.edit-course-to-speciality', compact('specialityCourse', 'courses', 'specialities'));
    }

}
