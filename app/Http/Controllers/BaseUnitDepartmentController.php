<?php

namespace App\Http\Controllers;

use App\Models\BaseUnits;
use App\Models\BaseUnitDepartment;
use App\Models\PracticeBase;
use App\Models\PracticeUnit;
use App\Models\PracticeDepartment;
use Illuminate\Http\Request;

class BaseUnitDepartmentController extends Controller
{
    public function addBaseUnitDep(Request $request)
    {
        $practiceBases = PracticeBase::select('id', 'nimi')->get();
        $practiceUnits = PracticeUnit::select('id', 'nimi')->get();
        $practiceDepartments = PracticeDepartment::select('id', 'nimi')->get();

        return view('BaseUnitDep.add-unit-dep-to-base', compact('practiceBases', 'practiceUnits', 'practiceDepartments'));
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
}
