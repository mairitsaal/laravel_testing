<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo()
    {
        $usertype = Auth::user()->usertype;
            switch ($usertype) {
                case 'admin':
                    return '/dashboard';
                    break;
                case 'student':
                    return '/home-student';
                    break;
                case 'practiceBaseInstructor':
                    return '/home-practiceBase-instructor';
                    break;
                case 'schoolInstructor':
                    return '/home-school-instructor';
                    break;
                case 'practiceBase':
                    return '/home-practiceBase';
                    break;
                case 'school':
                    return '/home-school';
                    break;
                default:
                    return '/home';
                    break;
            }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
