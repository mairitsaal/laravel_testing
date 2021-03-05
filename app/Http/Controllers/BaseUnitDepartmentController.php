<?php

namespace App\Http\Controllers;

use App\Models\BaseUnits;
use App\Models\BaseUnitDepartment;
use App\Models\PracticeBase;
use App\Models\PracticeUnit;
use App\Models\PracticeDepartment;
use Illuminate\Http\Request;
use DB;

class BaseUnitDepartmentController extends Controller
{
    public function addBaseUnitDep(Request $request)
    {
        $practiceBases = PracticeBase::select('id', 'nimi')->get();
        $practiceUnits = PracticeUnit::select('id', 'nimi')->get();
        //$baseUnits = BaseUnits::select('practice_base_id','practice_unit_id')->get();
        $practiceDepartments = PracticeDepartment::select('id', 'nimi')->get();

        return view('BaseUnitDep.add-unit-dep-to-base', compact('practiceUnits','practiceBases', 'practiceDepartments'));
    }
    public function createBaseUnitDep(Request $request)
    {
        $baseUnitDepartment = new BaseUnitDepartment();
        $baseUnitDepartment->id = $request->id;
        $baseUnitDepartment->practice_base_id = $request->practice_base_id;
        $baseUnitDepartment->practice_unit_id = $request->practice_unit_id;
        $baseUnitDepartment->practice_department_id = $request->practice_department_id;
        $baseUnitDepartment->save();

        return back()->with('baseUnitDep_created', 'Üksused lisatud praktikabaasile');
    }
    public function getBaseUnitsDeps()
    {
        $baseUnitDepartments = BaseUnitDepartment::all();
        $practiceBases = PracticeBase::select('id', 'nimi')->get();
        $practiceUnits = PracticeUnit::select('id', 'nimi')->get();
        $practiceDepartments = PracticeDepartment::select('id', 'nimi')->get();

        return view('BaseUnitDep.baseUnitsDeps', compact('baseUnitDepartments', 'practiceBases', 'practiceUnits', 'practiceDepartments'));
    }

    public function deleteBaseUnitsDeps($id)
    {
        BaseUnitDepartment::where('id', $id)->delete();
        return back()->with('baseUnitsDeps_deleted', 'Seos praktikabaasiga kustutatud');
    }

    public function deleteAllBaseUnitsDeps(Request $request)
    {
        $ids = $request->ids;
        DB::table("base_unit_departments")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Kõik valitud kirjed kustutatud andmebaasist."]);
    }

    public function editBaseUnitsDeps($id)
    {
        $baseUnitDepartment = BaseUnitDepartment::find($id);
        $practiceBases = PracticeBase::select('id', 'nimi')->get();
        $practiceUnits = PracticeUnit::select('id', 'nimi')->get();
        $practiceDepartments = PracticeDepartment::select('id', 'nimi')->get();
        return view('BaseUnitDep.edit-unit-dep-to-base', compact('baseUnitDepartment', 'practiceBases', 'practiceUnits', 'practiceDepartments'));
    }

    public function updateBaseUnitsDeps(Request $request)
    {
        $baseUnitDepartment = BaseUnitDepartment::with('practiceBase', 'practiceUnit', 'practiceDepartment')->find($request->id);
        $baseUnitDepartment->practice_base_id = $request->practice_base_id;
        $baseUnitDepartment->practice_unit_id = $request->practice_unit_id;
        $baseUnitDepartment->practice_department_id = $request->practice_department_id;
        $baseUnitDepartment->save();

        return back()->with('baseUnitsDeps_updated', 'Praktikabaas on edukalt uuendatud');
    }


    public function index()
    {
        $practiceBase = PracticeBase::select('id', 'nimi')->get();
        $practiceBase_list = DB::table('practice_base_units')
                            ->groupBy('practice_base_id')
                            ->get();
        return view('BaseUnitDep.dynamic-dropdown')->with('practiceBase_list', $practiceBase_list);
    }


    //public function index()
    //{
    //    $practice_bases = DB::table("practice_bases")->pluck("nimi", "id");
    //    return view('BaseUnitDep.dynamic-dropdown', compact('practice_bases'));
    //}

    //public function getUnits(Request $request)
    //{
    //    $practice_units = DB::table("practice_units")->pluck("nimi", "id");
    //    return response()->json($practice_units);
    //}

    //public function getDepartments(Request $request)
    //{
    //    $practice_departments = DB::table("practice_departments")->where("practice_unit_id", $request->practice_unit_id)
    //        ->pluck("nimi", "id");
    //    return response()->json($practice_departments);
    //}


}
