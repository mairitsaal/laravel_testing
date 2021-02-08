<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PracticeBase;
use App\Models\PracticeUnit;

class PracticeBaseController extends Controller
{
    public function addPracticeBase()
    {
        return view('add-practice-base');
    }

    public function createPracticeBase(Request $request)
    {
        $practiceBase = new PracticeBase();
        $practiceBase->nimi = $request->nimi;
        $practiceBase->lepinguNr = $request->lepinguNr;
        $practiceBase->registriNr = $request->registriNr;
        $practiceBase->aadress = $request->aadress;
        $practiceBase->telefon = $request->telefon;
        $practiceBase->email = $request->email;
        $practiceBase->lepinguAlgus = $request->lepinguAlgus;
        $practiceBase->lepinguLopp = $request->lepinguLopp;
        $practiceBase->tunniHind = $request->tunniHind;
        $practiceBase->allkirjastaja = $request->allkirjastaja;
        $practiceBase->kontaktBaasis = $request->kontaktBaasis;
        $practiceBase->markused = $request->markused;
        $practiceBase->save();
        return back()->with('practiceBase_created', 'Uus praktikabaas on sisestatud andmebaasi');
    }

    public function getPracticeBases()
    {
        $practiceBases = PracticeBase::orderBy('id', 'ASC')->get();
        return view('practiceBases', compact('practiceBases'));
    }

    public function getPracticeBaseById($id)
    {
        $practiceBase = PracticeBase::where('id', $id)->first();
        return view('singlePracticeBase', compact('practiceBase'));
    }

    public function deletePracticeBase($id)
    {
        PracticeBase::where('id', $id)->delete();
        return back()->with('practiceBase_deleted', 'Praktikabaas on andmebaasist kustutatud');
    }

    public function editPracticeBase($id)
    {
        $practiceBase = PracticeBase::find($id);
        return view('edit-practice-base', compact('practiceBase'));
    }

    public function updatePracticeBase(Request $request)
    {
        $practiceBase = PracticeBase::find($request->id);
        $practiceBase->nimi = $request->nimi;
        $practiceBase->lepinguNr = $request->lepinguNr;
        $practiceBase->registriNr = $request->registriNr;
        $practiceBase->aadress = $request->aadress;
        $practiceBase->telefon = $request->telefon;
        $practiceBase->email = $request->email;
        $practiceBase->lepinguAlgus = $request->lepinguAlgus;
        $practiceBase->lepinguLopp = $request->lepinguLopp;
        $practiceBase->tunniHind = $request->tunniHind;
        $practiceBase->allkirjastaja = $request->allkirjastaja;
        $practiceBase->kontaktBaasis = $request->kontaktBaasis;
        $practiceBase->markused = $request->markused;
        $practiceBase->save();
        return back()->with('practiceBase_updated', 'Praktikabaas edukalt uuendatud');

    }
        // One to Many
    //public function addPracticeUnit($id)
    //{
    //    $practiceBase = PracticeBase($id);
    //    $practiceUnit = new PracticeUnit();
    //    $practiceUnit->nimi;
    //    $practiceBase->practice_units()->save('$practiceUnit');
    //    return "Praktikaüksus on lisatud praktikabaasi";
    //}
//
    //public function getpracticeUnitByBase($id)
    //{
    //    $practiceUnits = PracticeBase::find($id)->practiceUnits;
    //    return $practiceUnits;
    //}
}
