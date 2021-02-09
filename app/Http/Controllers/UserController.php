<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function addUser()
    {
        return view('user.add-user');
    }

    public function createUser(Request $request)
    {
        $user = new User();
        $user->nimi = $request->nimi;
        $user->telefon = $request->telefon;
        $user->email = $request->email;
        $user->roll = $request->roll;
        $user->save();
        return back()->with('user_created', 'Uus kasutaja on edukalt loodud');
    }
}
