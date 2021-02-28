<?php

namespace App\Http\Controllers;

use DB;
use App\Models\PracticeDepartment;
use App\Models\PracticeUnit;
use Illuminate\Http\Request;

class PracticeDepartmentController extends Controller
{
    public function addPracticeDepartment()
    {
        return view('practiceDepartment.add-practice-department');
    }
    public function createPracticeDepartment(Request $request)
    {
        $practiceDepartment = new PracticeDepartment();
        $practiceDepartment->nimi = $request->nimi;
        $practiceDepartment->save();
        return back()->with('practiceDepartment_created', 'Praktika osakond on lisatud andmebaasi');
    }
    public function getPracticeDepartment()
    {
        $practiceDepartments = PracticeDepartment::orderBy('id', 'ASC')->get();
        return view('practiceDepartment.practiceDepartments', compact('practiceDepartments'));
    }
    public function getPracticeDepartmentById($id)
    {
        $practiceDepartment = PracticeDepartment::where('id', $id)->first();
        return view('practiceDepartment.singlePracticeDepartment', compact('practiceDepartment'));
    }
    public function deletePracticeDepartment($id)
    {
        PracticeDepartment::where('id', $id)->delete();
        return back()->with('practiceDepartment_deleted', 'Praktika osakond on andmebaasist kustutatud');
    }
    public function deleteAllPracticeDepartment(Request $request)
    {
        $ids = $request->ids;
        DB::table("practice_departments")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Kõik valitud kirjed kustutatud andmebaasist."]);
    }
    public function editPracticeDepartment($id)
    {
        $practiceDepartment = PracticeDepartment::find($id);
        $practiceUnits = PracticeUnit::select('id', 'nimi')->get();
        return view('practiceDepartment.edit-practice-department', compact('practiceDepartment', 'practiceUnits'));
    }

    public function updatePracticeDepartment(Request $request)
    {
        $practiceDepartment = PracticeDepartment::with('practiceUnit')->find($request->id);
        $practiceDepartment->nimi = $request->nimi;
        $practiceDepartment->practice_unit_id = $request->practice_unit_id;
        $practiceDepartment->save();
        return back()->with('practiceDepartment_updated', 'Praktika osakond on edukalt uuendatud');
    }

}
