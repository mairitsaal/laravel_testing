<?php

namespace App\Http\Controllers;

use App\Models\PracticeBase;
use App\Models\Speciality;
use Illuminate\Http\Request;

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
    public function editSpeciality($id)
    {
        $speciality = Speciality::find($id);
        return view('speciality.edit-speciality', compact('speciality'));
    }
    public function updateSpeciality(Request $request)
    {
        $speciality = Speciality::find($request->id);
        $speciality->nimi = $request->nimi;
        $speciality->kestvus = $request->kestvus;
        $speciality->oppevorm = $request->oppevorm;

        $speciality->save();
        return back()->with('speciality_updated', 'Eriala edukalt uuendatud');

    }
}
