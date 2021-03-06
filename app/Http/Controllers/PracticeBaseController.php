<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PracticeBase;
use App\Models\PracticeUnit;
use App\Models\BaseUnits;
use DB;

class PracticeBaseController extends Controller
{

    public function addPracticeBase()
    {
        return view('practiceBase.add-practice-base');
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
        return view('practiceBase.practiceBases', compact('practiceBases'));
    }

    public function getPracticeBaseById($id)
    {
        $practiceBase = PracticeBase::where('id', $id)->first();
        return view('practiceBase.singlePracticeBase', compact('practiceBase'));
    }

    public function deletePracticeBase($id)
    {
        PracticeBase::where('id', $id)->delete();
        return back()->with('practiceBase_deleted', 'Praktikabaas on andmebaasist kustutatud');
    }

    public function deleteAllPracticeBase(Request $request)
    {
        $ids = $request->ids;
        DB::table("practice_bases")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Kõik valitud kirjed kustutatud andmebaasist."]);
    }

    public function editPracticeBase($id)
    {
        $practiceBase = PracticeBase::find($id);
        return view('practiceBase.edit-practice-base', compact('practiceBase'));
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

}
