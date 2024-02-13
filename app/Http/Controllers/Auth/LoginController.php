<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\Setting;
use Auth;
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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        if (User::first()) {
            if (Setting::notSet()) {
                return view('setup');
            } else {
                return view('auth.login');
            }
        } else {
            return Redirect()->route('setupUser');
        }
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Retrieve the user by phone number
        $user = User::where('email', $request->email)->first();

        
        // Check if the user exists and the password is correct
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            // dd(Auth::guard());
            // Authenticate the user
            Auth::login($user);

            // dd(Auth::guard());

            // Authentication successful, redirect to dashboard or any other route
            return redirect()->route('dashboard')->with('success', 'Authentication successful!');
        }


        // Authentication failed, redirect back with error message
        return redirect()->route('dashboard')->with('error', 'Invalid phone number or password.');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
