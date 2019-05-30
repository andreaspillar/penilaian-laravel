<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;


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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
    {
      if (Auth::check() && Auth::user()->id_jabatan == 1) {
        return '/adminhr';
      }
      elseif (Auth::check() && Auth::user()->id_jabatan == 4) {
        return '/kabid';
      }
      elseif (Auth::check() && Auth::user()->id_jabatan == 3) {
        return '/manajer';
      }
      elseif (Auth::check() && Auth::user()->id_jabatan == 2) {
        return '/pimpinan';
      }
    }
}
