<?php

namespace App\Http\Controllers;

use App\Models\PracticeBase;
use Illuminate\Http\Request;
use App\Models\PracticeUnit;

class PracticeUnitController extends Controller
{
    public function addPracticeUnit()
    {
        return view('practiceUnit.add-practice-unit');
    }

    public function createPracticeUnit(Request $request)
    {
        $practiceUnit = new PracticeUnit();
        $practiceUnit->nimi = $request->nimi;
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PracticeUnit  $practiceUnit
     * @return \Illuminate\Http\Response
     */
    public function editPracticeUnit($id)
    {
        $practiceUnit = PracticeUnit::find($id);
        $practiceBaseList = PracticeBase::select('id', 'nimi')->get();
        return view('practiceUnit.edit-practice-unit', compact('practiceUnit', 'practiceBaseList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PracticeUnit  $practiceUnit
     * @return \Illuminate\Http\Response
     */
    public function updatePracticeUnit(Request $request)
    {
        $practiceUnit = PracticeUnit::with('practiceBase')->find($request->id);
        $practiceUnit->nimi = $request->nimi;
        $practiceUnit->practice_base_id = $request->practice_base_id;
        $practiceUnit->save();
        return back()->with('practiceUnit_updated', 'Praktikaüksus on edukalt uuendatud');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PracticeUnit  $practiceUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(PracticeUnit $practiceUnit)
    {
        //
    }
}
