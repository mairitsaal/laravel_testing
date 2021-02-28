<?php

namespace App\Http\Controllers;

use App\Models\Course;
use DB;
use App\Models\Speciality;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function addCourse()
    {
        return view('course.add-course');
    }
    public function createCourse(Request $request)
    {
        $course = new Course();
        $course->nimi = $request->nimi;
        $course->opilasteArv = $request->opilasteArv;

        $course->save();
        return back()->with('course_created', 'Uus kursus on sisestatud andmebaasi');
    }
    public function getCourse()
    {
        $courses = Course::orderBy('id', 'ASC')->get();
        return view('course.courses', compact('courses'));
    }
    public function deleteCourse($id)
    {
        Course::where('id', $id)->delete();
        return back()->with('course_deleted', 'Kursus on andmebaasist kustutatud');
    }

    public function deleteAllCourse(Request $request)
    {
        $ids = $request->ids;
        DB::table("courses")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Kõik valitud kirjed kustutatud andmebaasist."]);
    }
    public function editCourse($id)
    {
        $course = Course::find($id);
        return view('course.edit-course', compact('course'));
    }
    public function updateCourse(Request $request)
    {
        $course = Course::find($request->id);
        $course->nimi = $request->nimi;
        $course->opilasteArv = $request->opilasteArv;

        $course->save();
        return back()->with('course_updated', 'Kursus edukalt uuendatud');

    }
}
