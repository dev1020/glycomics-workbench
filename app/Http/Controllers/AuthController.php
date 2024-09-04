<?php

namespace App\Http\Controllers;

use App\Mail\LoginOtp;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function loadRegister()
    {
        if (Auth::user()) {
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'string|required|min:2',
            'email' => 'string|email|required|max:100|unique:users',
            'password' => 'string|required|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Your Registration has been successfull.');
    }

// Load the Login View
    public function loadLogin()
    {
        if (Auth::user()) {
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('admin.login');
    }

    // Load the OTP Page View
    public function otpPage()
    {
        if (Session::has('userEmail')) {
            return view('admin.otp-verification');
        } elseif (Auth::user()) {
            $route = $this->redirectDash();
            return redirect($route);
        } else {
            abort(404);
        }
    }


// Validate Login and Redirect
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'string|required|email',
            'password' => 'string|required'
        ]);

        $userCredential = $request->only('email', 'password');
        if (Auth::validate($userCredential)) {
            $user = User::where('email', $request['email'])->first();
            if($user->hasRole('admin')){
                if ($user->two_factor_auth == 'yes') {
                Session::put('userEmail', $request['email']);
                $otp = (int)rand(100001, 999999);

                Log::info('TFA Enabled- OTP ' .$otp);
                $user->otp_token = Hash::make($otp);
                $user->save();
                $emailTo = [
                    [
                        'email' => $user->email,
                        'name' => $user->name,
                    ]
                ];
                Mail::to($user)->send(new LoginOtp($otp));
                //Artisan::call('queue:work');
                return redirect('admin/otp-verification');
                } else {
                    Log::info('TFA Disabled');
                    if (Auth::attempt($userCredential)) {
                        $route = $this->redirectDash();
                        return redirect($route);
                    }
                }
                
            }else{
                 return back()->withErrors(['error' => 'User does not have the right roles. ']);
            }
            
            
        } else {
            return back()->withErrors(['error' => 'Username & Password is incorrect']);
        }
//        if(Auth::attempt($userCredential)){
//            //Log::info('This is some useful information.');
//
//            $route = $this->redirectDash();
//            return redirect($route);
//        }
//        else{
//             return back()->withErrors(['error' => 'Username & Password is incorrect']);
//        }
    }

    public function verifyOtp(Request $request)
    {

        $request->validate([
            'otp' => 'numeric|max_digits:6|min_digits:6',

        ]);
        $userEmail = Session::get('userEmail');
        $user = User::where('email', $userEmail)->first();
        $otp = (int) $request['otp'];
        if(Hash::check($otp, $user->otp_token)){
            Auth::login($user);
            $route = $this->redirectDash();
            return redirect($route);
        } else {
            return back()->withErrors(['error' => 'Otp mismatch']);
        }
    }

// Load the dashboard view
    public function loadDashboard()
    {
        return view('admin.dashboard');
    }


    public function redirectDash()
    {
        $redirect = '';

        /*if(Auth::user() && Auth::user()->role == 1){
            $redirect = '/super-admin/dashboard';
        }
        else if(Auth::user() && Auth::user()->role == 2){
            $redirect = '/sub-admin/dashboard';
        }
        else if(Auth::user() && Auth::user()->role == 3){
            $redirect = '/admin/dashboard';
        }
        else{*/
        $redirect = '/admin/dashboard';
        //}

        return $redirect;
    }

// User Logout and flush the session
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/admin');
    }
}
