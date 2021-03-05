<?php

namespace App\Http\Controllers;

use App\Models\PracticeBase;
use Illuminate\Http\Request;
use App\Models\PracticeUnit;
use DB;

class PracticeUnitController extends Controller
{
    public function addPracticeUnit()

    {
        $practiceBase = PracticeBase::select('id', 'nimi')->get();
        return view('practiceUnit.add-practice-unit', compact('practiceBase'));
    }

    public function createPracticeUnit(Request $request)
    {
        $practiceUnit = new PracticeUnit();
        $practiceUnit->nimi = $request->nimi;
        $practiceUnit->practice_base_id = $request->practice_base_id;

        $practiceUnit->save();
        return back()->with('practiceUnit_created', 'Praktikaüksus on lisatud andmebaasi');
    }

    public function getPracticeUnit()
    {
        $practiceUnits = PracticeUnit::with('practiceBase')->orderBy('id', 'ASC')->get();
        return view('practiceUnit.practiceUnits', compact('practiceUnits'));
    }

    public function getPracticeUnitById($id)
    {
        $practiceUnit = PracticeUnit::where('id', $id)->first();
        return view('practiceUnit.singlePracticeUnit', compact('practiceUnit'));
    }

    public function deletePracticeUnit($id)
    {
        PracticeUnit::where('id', $id)->delete();
        return back()->with('practiceUnit_deleted', 'Praktikaüksus on andmebaasist kustutatud');
    }
    public function deleteAllPracticeUnit(Request $request)
    {
        $ids = $request->ids;
        DB::table("practice_units")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Kõik valitud kirjed kustutatud andmebaasist."]);
    }

    public function editPracticeUnit($id)
    {
        $practiceUnit = PracticeUnit::find($id);
        $practiceBase = PracticeBase::select('id', 'nimi')->get();
        return view('practiceUnit.edit-practice-unit', compact('practiceUnit', 'practiceBase'));
    }

    public function updatePracticeUnit(Request $request)
    {
        $practiceUnit = PracticeUnit::with('practiceBase')->find($request->id);
        $practiceUnit->nimi = $request->nimi;
        $practiceUnit->practice_base_id = $request->practice_base_id;
        $practiceUnit->save();
        return back()->with('practiceUnit_updated', 'Praktikaüksus on edukalt uuendatud');
    }

    public function index()
    {
        $practice_units = PracticeUnit::whereHas('practice_base', function ($query){
            $query->whereId(request()->input('practice_base_id', 0 ));
        })->pluck('nimi', 'id');

        return response()->json($practice_units);
    }

    public function destroy(PracticeUnit $practiceUnit)
    {
        //
    }
}
