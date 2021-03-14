<?php

namespace App\Http\Controllers;

use App\Models\Framework;
use App\Models\User;
use Illuminate\Http\Request;

class FrameworkController extends Controller
{
    public function index()
    {
        return view('framework');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $data = [];
        $data['name'] = json_encode($input['name']);

        return response()->json(['success'=>'Success Fully Insert Recoreds']);
    }
}
