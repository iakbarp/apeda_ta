<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($this->guard()->user()->role->name=='Admin'){

            return redirect(url('bappeda/'));
        }
        elseif ($this->guard()->user()->role->name=='Bappeda'){

            return redirect(url('admin/'));
        }
        else{
            return redirect(url('home/'));

        }
    }
    protected function credentials(Request $request)
    {
        return ['email'=>$request->{$this->username()}, 'password'=>$request->password,'status'=>'1'];
//        return ['email'=>$this->username(),'password'=>$request->getPassword()]
    }
}
