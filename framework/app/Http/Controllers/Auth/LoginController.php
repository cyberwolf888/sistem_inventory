<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    protected function authenticated($request, $user)
    {
        if($user->isActive == 0){
            $this->logout($request);
        }

        // $user->update([
        //     'last_login_at' => Carbon::now()->toDateTimeString(),
        //     'last_login_ip' => $request->getClientIp() == '::1' ? 'localhost' : $request->getClientIp()
        // ]);


        if($user->can('owner-access')) {
            return redirect()->route( 'backend.dashboard');
        }

        if($user->can('admin-access')) {
            return redirect()->route( 'backend.dashboard');
        }

        return redirect()->intended('/');
    }
}
