<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $users = User::with('practiceInstructors')->find($id);
        $users->name = $request->name;
        //$users->practiceInstructors->name = $request->practiceInstructors->name;
        $users->phone = $request->phone;
        //$users->practiceInstructors->phone = $request->practiceInstructors->phone;
        $users->email = $request->email;
        //$users->practiceInstructors->email = $request->practiceInstructors->email;
        $users->usertype = $request->usertype;
        //$users->practice_instructor_id->id = $request->practice_instructor_id->id;

        $users->update();

        return redirect('/role-register')->with('user_updated', 'Kasutaja andmed edukalt uuendatud');
    }

    public function deleteRegisterUser($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/role-register')->with('user_deleted', 'Kasutaja andmed kustutatud');
    }
}
