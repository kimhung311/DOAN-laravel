<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Session;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // /*
    // |--------------------------------------------------------------------------
    // | Login Controller
    // |--------------------------------------------------------------------------
    // |
    // | This controller handles authenticating users for the application and
    // | redirecting them to your home screen. The controller uses a trait
    // | to conveniently provide its functionality to your applications.
    // |
    // */

    // use AuthenticatesUsers;

    // /**
    //  * Where to redirect users after login.
    //  *
    //  * @var string
    //  */
    protected $redirectTo = '/admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest:admin', ['except' => 'logout']);
    }

    public function getLogin()
    {
        return view('admin.auth.login');
    }

    /**
     * Show the application loginprocess.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            $user = auth()->guard('admin')->user();
            
            \Session::put('success','You are Login successfully!!');
            return redirect()->route('admin.dashboard');
            
        } else {
            return back()->with('error','your username and password are wrong.');
        }

    }

    /**
     * Show the application logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        // auth()->guard('admin')->logout();
        // \Session::flush();
        \Session::put('success','You are logout successfully');        
        return redirect(route('admin.login'));
    }
}
