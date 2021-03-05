<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpecialityController extends Controller
{

    public function addSpeciality()
    {
        return view('speciality.add-speciality');
    }


    public function createSpeciality(Request $request)
    {
        $speciality = new Speciality();
        $speciality->nimi = $request->nimi;
        $speciality->kestvus = $request->kestvus;
        $speciality->oppekava = $request->oppekava;
        $speciality->oppevorm = $request->oppevorm;

        $speciality->save();

        return back()->with('speciality_created', 'Uus eriala on sisestatud andmebaasi');
    }
    public function getSpeciality()
    {
        $specialities = Speciality::orderBy('id', 'ASC')->get();
        return view('speciality.specialities', compact('specialities'));
    }

    public function deleteSpeciality($id)
    {
        Speciality::where('id', $id)->delete();
        return back()->with('speciality_deleted', 'Eriala on andmebaasist kustutatud');
    }


    public function deleteAllSpeciality(Request $request)
    {
        $ids = $request->ids;
        DB::table("specialities")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Kõik valitud kirjed kustutatud andmebaasist."]);
    }

    public function editSpeciality($id)
    {
        $speciality = Speciality::find($id);
        return view('speciality.edit-speciality', compact('speciality'));
    }
    public function updateSpeciality(Request $request)
    {
        $speciality = Speciality::find($request->id);
        $speciality->nimi = $request->nimi;
        $speciality->oppekava = $request->oppekava;
        $speciality->oppevorm = $request->oppevorm;
        $speciality->kestvus = $request->kestvus;

        $speciality->save();

        return back()->with('speciality_updated', 'Eriala edukalt uuendatud');

    }

}
