<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PracticeBase;
use App\Models\PracticeDepartment;
use App\Models\PracticeUnit;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    //protected $redirectTo = '/role-register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
        $this->middleware('admin');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:10', 'min:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'position' => ['required', 'string',  'max:255'],
            'usertype' => ['required', 'string', 'max:100'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'position' => $data['position'],
            'usertype' => $data['usertype'],
            'password' => Hash::make($data['password']),
        ]);

    }
    public function dynamicDropdown()
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
        return view('auth.register', compact('practiceBases', 'practiceUnits', 'practiceDepartments'))->with('holeList', $holeList);
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
