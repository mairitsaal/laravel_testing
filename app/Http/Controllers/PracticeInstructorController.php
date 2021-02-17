<?php

namespace App\Http\Controllers;

use App\Models\PracticeInstructor;
use Illuminate\Http\Request;

class PracticeInstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addPracticeInstructor()
    {
        return view('practiceInstructor.add-practice-instructor');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PracticeInstructor  $practiceInstructor
     * @return \Illuminate\Http\Response
     */
    public function show(PracticeInstructor $practiceInstructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PracticeInstructor  $practiceInstructor
     * @return \Illuminate\Http\Response
     */
    public function edit(PracticeInstructor $practiceInstructor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PracticeInstructor  $practiceInstructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PracticeInstructor $practiceInstructor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PracticeInstructor  $practiceInstructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(PracticeInstructor $practiceInstructor)
    {
        //
    }
}
