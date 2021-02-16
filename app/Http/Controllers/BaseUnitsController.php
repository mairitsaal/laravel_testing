<?php

namespace App\Http\Controllers;

use App\Models\BaseUnits;
use App\Models\PracticeBase;
use App\Models\PracticeUnit;
use Illuminate\Http\Request;
use DB;

class BaseUnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dropDownBase(Request $request)
    {
        $practiceBaseList = PracticeBase::select('id', 'nimi')->get();
        $practiceUnits = PracticeUnit::select('id', 'nimi')->get();

        //return view('BaseUnits.add-unit-to-base', compact('practiceBaseList', 'practiceUnits'));
        return view('BaseUnits.add-unit-to-base', compact('practiceBaseList', 'practiceUnits'));
    }



    public function createBaseUnit(Request $request)
    {
        $baseUnit = new BaseUnits();
        $baseUnit->id = $request->id;
        $baseUnit->practice_base_id = $request->practice_base_id;
        $baseUnit->practice_unit_id = $request->practice_unit_id;
        $baseUnit->save();

        return back()->with('baseUnit_created', 'Üksus lisatud praktikabaasile');
    }

    public function getBaseUnits()
    {
        $baseUnits = BaseUnits::orderBy('id', 'ASC')->get();
        //$practiceBases = PracticeBase::find('nimi');
        //$practiceUnits = PracticeUnit::find('nimi');

        //$baseUnits = BaseUnits::all();

        //foreach ($baseUnits as $baseUnit){

            //$username = $baseUnit->id->nimi;
            //return $username;
        //$units = PracticeBase::with('UnitToBase')->get();
        //$unit->UnitToBase->nimi;

        $practiceBaseList = PracticeBase::select('id', 'nimi')->get();
        $practiceUnits = PracticeUnit::select('id', 'nimi')->get();
        return view('BaseUnits.baseUnits', compact('baseUnits', 'practiceBaseList', 'practiceUnits'));

    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BaseUnits  $baseUnits
     * @return \Illuminate\Http\Response
     */
    public function showData()
    {
        //DB::table('base_units')->get();


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BaseUnits  $baseUnits
     * @return \Illuminate\Http\Response
     */
    public function edit(BaseUnits $baseUnits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BaseUnits  $baseUnits
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BaseUnits $baseUnits)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BaseUnits  $baseUnits
     * @return \Illuminate\Http\Response
     */
    public function destroy(BaseUnits $baseUnits)
    {
        //
    }
}
