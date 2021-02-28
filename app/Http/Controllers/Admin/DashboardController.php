<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PracticeBase;
use App\Models\PracticeDepartment;
use App\Models\PracticeUnit;
use DB;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function registeredUser()
    {
        $users = User::all();
        return view('admin.register')->with('users', $users);
    }

    public function editRegisterUser(Request $request, $id)
    {
        $users= User::findOrFail($id);
        return view('admin.edit-register-user')->with('users', $users);
    }

    public function updateRegisterUser(Request $request, $id)
    {
        $users = User::with('practiceBases', 'practiceUnits', 'practiceDepartments', 'baseUnitDepartments')->find($id);
        $users->name = $request->name;
        $users->phone = $request->phone;
        $users->email = $request->email;
        $users->usertype = $request->usertype;
        $users->position = $request->position;

        $users->update();

        return redirect('/role-register')->with('user_updated', 'Kasutaja andmed edukalt uuendatud');
    }

    public function deleteRegisterUser($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/role-register')->with('user_deleted', 'Kasutaja andmed kustutatud');
    }
    public function deleteAllUsers(Request $request)
    {
        $ids = $request->ids;
        DB::table("users")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Kõik valitud kirjed kustutatud andmebaasist."]);
    }
    public function dynamicDropdown()
    {
        //$practiceBases = PracticeBase::select('id', 'nimi')->get();
        //$practiceBases = PracticeBase::pluck('nimi', 'id');
        $practiceBases = PracticeBase::select('id', 'nimi')->get();
        $practiceUnits = PracticeUnit::select('id', 'nimi')->get();
        $practiceDepartments = PracticeDepartment::select('id', 'nimi')->get();
        //$baseUnitdepartments = BaseUnitDepartment::select('id', 'nimi')->get();

        $holeList = DB::table('base_unit_departments')
            ->groupBy('practice_base_id')
            ->get();

        //return view('BaseUnitDep.add-unit-dep-to-base')->with('holeList', $holeList);
        return view('auth.register', compact('practiceBases', 'practiceUnits', 'practiceDepartments'))->with('holeList', $holeList);
    }
    public function dynamicDropdown2()
    {
        //$practiceBases = PracticeBase::select('id', 'nimi')->get();
        $practiceBases = PracticeBase::pluck('nimi', 'id');
        $practiceUnits = PracticeUnit::pluck('nimi', 'id');
        $practiceDepartments = PracticeDepartment::pluck('nimi', 'id');
        //$baseUnitdepartments = BaseUnitDepartment::select('id', 'nimi')->get();

        $holeList = DB::table('base_unit_departments')
            ->groupBy('practice_base_id')
            ->get();

        //return view('BaseUnitDep.add-unit-dep-to-base')->with('holeList', $holeList);
        return view('admin.edit-register-user', compact('practiceBases', 'practiceUnits', 'practiceDepartments'))->with('holeList', $holeList);
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
