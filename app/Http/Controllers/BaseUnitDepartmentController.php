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

    public function dynamicDropdown()
    {
        //$practiceBases = PracticeBase::select('id', 'nimi')->get();
        $practiceBases = PracticeBase::pluck('nimi', 'id');
        $practiceUnits = PracticeUnit::pluck('nimi', 'id');
        $practiceDepartments = PracticeDepartment::pluck('nimi', 'id');
        //$baseUnitdepartments = BaseUnitDepartment::select('id', 'nimi')->get();

        $holeList = DB::table('base_unit_departments')
            ->groupBy('practice_base_id')
            ->get();

        //return view('BaseUnitDep.add-unit-dep-to-base')->with('holeList', $holeList);
        return view('BaseUnitDep.dynamic-dropdown', compact('practiceBases', 'practiceUnits', 'practiceDepartments'))->with('holeList', $holeList);
    }

    public function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('base_unit_departments')
            ->where($select, $value)
            ->groupBy($dependent)
            ->get();
        $output = '<option value="">Vali '.ucfirst($dependent).'</option>';
        foreach ($data as $row)
        {
            $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo $output;
    }


}
