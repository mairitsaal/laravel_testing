<?php

namespace App\Http\Controllers;

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
    public function editPracticeDepartment($id)
    {
        $practiceDepartment = PracticeDepartment::find($id);
        return view('practiceDepartment.edit-practice-department', compact('practiceDepartment'));
    }

    public function updatePracticeDepartment(Request $request)
    {
        $practiceDepartment = PracticeDepartment::find($request->id);
        $practiceDepartment->nimi = $request->nimi;
        $practiceDepartment->save();
        return back()->with('practiceDepartment_updated', 'Praktika osakond on edukalt uuendatud');
    }

}
