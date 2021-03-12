<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DropdownController extends Controller
{
    public function index()
    {
        $practice_bases = DB::table("practice_bases")->pluck("nimi", "id");
        return view('BaseUnitDep.dynamic-dropdown', compact('practice_bases'));
    }

    public function getUnits(Request $request)
    {
        $practice_units = DB::table("practice_units")->pluck("nimi", "id");
        return response()->json($practice_units);
    }

    public function getDepartments(Request $request)
    {
        $practice_departments = DB::table("practice_departments")->where("practice_unit_id", $request->practice_unit_id)
            ->pluck("nimi", "id");
        return response()->json($practice_departments);
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
