<?php

namespace App\Http\Controllers;

use App\Models\Course;
use DB;
use App\Models\PracticeRequirement;
use App\Models\PracticeUnit;
use Illuminate\Http\Request;

class PracticeRequirementController extends Controller
{
    public function addPracticeReq()
    {
        $courses = Course::select('id', 'nimi')->get();
        return view('practiceRequirement.add-practice-requirement', compact('courses'));
    }
    public function createPracticeReq(Request $request)
    {

        //if($kirjeldus = $request->file('kirjeldus')) {
            //$kirjeldus = $kirjeldus->getClientOriginalName();
            //if ($kirjeldus->move('requirements', $kirjeldus)) {

                //if(request()->hasFile('kirjeldus')){
                //$kirjeldus = $request->file('kirjeldus')->getClientOriginalName();
                //request()->file('kirjeldus')->storeAs('requirements', $practiceRequirement->id . '/' . $kirjeldus, '');
                //$practiceRequirement->update(['kirjeldus' => $kirjeldus]);

                $practiceRequirement = new PracticeRequirement();
                $practiceRequirement->nimi = $request->nimi;
                $practiceRequirement->course_id = $request->course_id;
                $practiceRequirement->maht = $request->maht;
                $practiceRequirement->kirjeldus = $request->kirjeldus;
                $practiceRequirement->esimenePaevKaasa = $request->esimenePaevKaasa;


                $practiceRequirement->save();
                return back()->with('practiceReq_created', 'Uus praktikanõue on sisestatud andmebaasi');
            //};
        }
       // }
    public function getPracticeReq()
    {
        $practiceRequirements = PracticeRequirement::with('courses')->orderBy('id', 'ASC')->get();
        return view('practiceRequirement.practiceReqs', compact('practiceRequirements'));
    }
    public function getPracticeReqById($id)
    {
        $practiceRequirement = PracticeRequirement::where('id', $id)->first();
        return view('practiceRequirement.singlePracticeReq', compact('practiceRequirement'));
    }
    public function deletePracticeReq($id)
    {
        PracticeRequirement::where('id', $id)->delete();
        return back()->with('practiceReq_deleted', 'Praktikanõue on andmebaasist kustutatud');
    }
    public function deleteAllPracticeReqs(Request $request)
    {
        $ids = $request->ids;
        DB::table("requirements")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Kõik valitud kirjed kustutatud andmebaasist."]);
    }

    public function editPracticeReq($id)
    {
        $practiceRequirement = PracticeRequirement::find($id);
        $courses = Course::select('id', 'nimi')->get();
        return view('practiceRequirement.edit-practice-requirement', compact('practiceRequirement', 'courses'));
    }

    public function updatePracticeReq(Request $request)
    {
        $practiceRequirement = PracticeRequirement::with('courses')->find($request->id);
        $practiceRequirement->nimi = $request->nimi;
        $practiceRequirement->course_id = $request->course_id;
        $practiceRequirement->maht = $request->maht;
        $practiceRequirement->kirjeldus = $request->kirjeldus;
        $practiceRequirement->esimenePaevKaasa = $request->esimenePaevKaasa;
        $practiceRequirement->save();
        return back()->with('practiceReq_updated', 'Praktikanõue on edukalt uuendatud');
    }


}
