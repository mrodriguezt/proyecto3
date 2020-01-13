<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Adldap\Laravel\Facades\Adldap;
use Illuminate\Support\Facades\Auth;
use App\User;
use \Illuminate\Http\Request;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        // we could return config('ldap_auth...') directly
        // but it seems to change a lot and with this check we make sure
        // that it will fail in future versions, if changed.
        // you can return the config(...) directly if you want.
       /* $column_name = config('ldap_auth.identifiers.database.username_column', null);
        if ( !$column_name ) {
            die('Error in LoginController::username(): could not find username column.');
        }*/
        return "username";
    }

}
