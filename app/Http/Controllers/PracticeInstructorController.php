<?php

namespace App\Http\Controllers;

use App\Models\BaseUnitDepartment;
use App\Models\PracticeBase;
use App\Models\PracticeDepartment;
use App\Models\PracticeInstructor;
use App\Models\PracticeUnit;
use App\Models\User;
use DB;

use Illuminate\Http\Request;

class PracticeInstructorController extends Controller
{
    public function addPracticeInstructor()
    {
        return view('practiceInstructor.add-practice-instructor');
    }
    public function createPracticeInstructor(Request $request)
    {
        $practiceInstructor = new PracticeInstructor();
        //$practiceInstructor->user->name = $request->user->name;
        //$practiceInstructor->phone = $request->phone;
        //$practiceInstructor->position = $request->position;
        //$practiceInstructor->email = $request->email;
        //$user = new User();
        //$user->name = $request->name;
        //$user->phone = $request->phone;
        //$user->email = $request->email;
        //$user->password = $request->password;
        //$user->usertype = $request->usertype;

        //$user->save();

        //$practiceInstructor = new PracticeInstructor();
        $practiceInstructor->practice_instructor_id = $request->practice_instructor_id;
        $practiceInstructor->position = $request->position;
        $practiceInstructor->save();


        return back()->with('practiceInstructor_created', 'Praktikajuhendaja on lisatud andmebaasi');
    }

    public function getPracticeInstructor()
    {
        $practiceInstructors = PracticeInstructor::with('user', 'baseUnitDepartments', 'practiceBase', 'practiceUnit', 'practiceDepartment')->orderBy('id', 'ASC')->get();
       // $practiceInstructors = PracticeInstructor::whereHas(
       //     'User', function($q){
       //    $q->where('usertype', 'practiceBaseInstructor');
        //}
        //)->get();

        return view('practiceInstructor.practiceInstructors', compact('practiceInstructors'));
    }
    public function dynamicDropdown()
    {
        $practiceBases = PracticeBase::select('id', 'nimi')->get();
        $practiceUnits = PracticeUnit::select('id', 'nimi')->get();
        $practiceDepartments = PracticeDepartment::select('id', 'nimi')->get();


        $holeList = DB::table('base_unit_departments')
            ->groupBy('practice_base_id')
            ->get();

        //return view('BaseUnitDep.add-unit-dep-to-base')->with('holeList', $holeList);
        return view('practiceInstructor.add-practice-instructor', compact('practiceBases',  'practiceUnits', 'practiceDepartments'))->with('holeList', $holeList);
    }

    public function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('base_unit_departments')
            ->where($select, $value)
            ->groupBy($dependent)
            ->get();
        $output = '<option value="">Vali '.ucfirst($dependent).'</option>';
        foreach ($data as $row)
        {
            $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo $output;
    }
}
