<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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



    public function authenticated()
    {
        if (Auth::user()->is_admin == 1) {

            return redirect()->route('dashboard')->with('success', 'login Successfully');
        } else {

            return redirect('/')->with('success', 'login Successfully');
        }
    }




    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
