<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use Illuminate\Http\Request;
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
   


protected function authenticated(Request $request, $user)
{
if ( Session::get('path') ) {// do your magic here
    Session::put('loginin', true);
    // dd(Session::get('loginin'));
    return redirect('book3');
}
Session::put('loginin', true);

 return redirect('/home');
}

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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
