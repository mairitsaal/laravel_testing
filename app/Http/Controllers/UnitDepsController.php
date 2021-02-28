<?php

namespace App\Http\Controllers;


use App\Models\BaseUnits;
use App\Models\UnitDeps;
use App\Models\PracticeDepartment;
use App\Models\PracticeUnit;
use Illuminate\Http\Request;

class UnitDepsController extends Controller
{
    public function addUnitDeps(Request $request)
    {
        $practiceUnits = PracticeUnit::select('id', 'nimi')->get();
        $practiceDepartments = PracticeDepartment::select('id', 'nimi')->get();

        //return view('BaseUnits.add-unit-to-base', compact('practiceBaseList', 'practiceUnits'));
        return view('UnitDeps.add-dep-to-unit', compact('practiceUnits', 'practiceDepartments'));
    }
    public function createUnitDeps(Request $request)
    {
        $unitDep = new UnitDeps();
        $unitDep->id = $request->id;
        $unitDep->practice_unit_id = $request->practice_unit_id;
        //$baseUnit->practice_base_id->nimi = $request->practice_base_id->nimi;
        $unitDep->practice_department_id = $request->practice_department_id;
        //$baseUnit->practice_unit_id->nimi = $request->practice_unit_id->nimi;
        $unitDep->save();

        return back()->with('unitDep_created', 'Osakond lisatud praktikaüksusele');
    }
    public function getUnitDeps()
    {
        $unitDeps = UnitDeps::all();
        $practiceUnits = PracticeUnit::select('id', 'nimi')->get();
        $practiceDepartments = PracticeDepartment::select('id', 'nimi')->get();
        return view('UnitDeps.unitDeps', compact('unitDeps', 'practiceDepartments', 'practiceUnits'));

    }
    public function deleteUnitDeps($id)
    {
        UnitDeps::where('id', $id)->delete();
        return back()->with('unitDep_deleted', 'Seos on andmebaasist kustutatud');
    }
    public function editUnitDeps($id)
    {
        $unitDeps = UnitDeps::find($id);
        $practiceUnits = PracticeUnit::select('id', 'nimi')->get();
        $practiceDepartments = PracticeDepartment::select('id', 'nimi')->get();
        return view('UnitDeps.edit-dep-to-unit', compact('unitDeps', 'practiceUnits', 'practiceDepartments'));
    }
    public function updateUnitDeps(Request $request)
    {
        $unitDeps = UnitDeps::with('practiceUnits', 'practiceDepartments')->find($request->id);
        $unitDeps->practice_unit_id = $request->practice_unit_id;
        $unitDeps->practice_department_id = $request->practice_department_id;
        $unitDeps->save();
        return back()->with('unitDep_updated', 'Seos praktikaüksuse ja osakonna vahel on edukalt uuendatud');
    }
}
