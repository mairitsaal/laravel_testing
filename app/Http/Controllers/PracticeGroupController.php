<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PracticeGroup;
use Illuminate\Http\Request;

class PracticeGroupController extends Controller
{
    public function index()
    {
        return view('practiceGroup');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $data = [];
        $data['nimi'] = json_encode($input['nimi']);

        PracticeGroup::create($data);
        return response()->json(['success'=>'Success Fully Insert Recoreds']);
    }


    public function addPracticeGroup()

    {
        $users = User::select('id', 'name')->get();
        return view('practiceGroup.add-practice-group', compact('users'));
    }
    public function createPracticeGroup(Request $request)
    {
        $practiceGroup = new PracticeGroup();
        $practiceGroup->nimi = $request->nimi;
        $practiceGroup->user_id = $request->user_id;
        //$input = $request->all();
        //$input['user_id'] = json_encode($input['user_id']);

        $practiceGroup->save();
        return back()->with('practiceGroup_created', 'Praktikagrupp on lisatud andmebaasi');
    }


    public function getPracticeGroup()
    {
        $practiceGroups = PracticeGroup::with('users')->orderBy('id', 'ASC')->get();
        return view('practiceGroup.practiceGroups', compact('practiceGroups'));
    }

    public function getPracticeGroupById($id)
    {
        $practiceGroup = PracticeGroup::where('id', $id)->first();
        return view('practiceGroup.singlePracticeGroup', compact('practiceGroup'));
    }
}
