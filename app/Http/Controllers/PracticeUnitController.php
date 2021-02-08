<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PracticeUnit;

class PracticeUnitController extends Controller
{
    public function addPracticeUnit()
    {
        return view('add-practice-unit');
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
        $practiceUnits = PracticeUnit::orderBy('id', 'ASC')->get();
        return view('practiceUnits', compact('practiceUnits'));
    }

    public function getPracticeUnitById($id)
    {
        $practiceUnit = PracticeUnit::where('id', $id)->first();
        return view('singlePracticeUnit', compact('practiceUnit'));
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
        return view('edit-practice-unit', compact('practiceUnit'));
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
        $practiceUnit = PracticeUnit::find($request->id);
        $practiceUnit->nimi = $request->nimi;
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
