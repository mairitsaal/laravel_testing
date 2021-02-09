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
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->phone = $request->input('phone');
        $users->email = $request->input('email');
        $users->usertype = $request->input('usertype');
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
