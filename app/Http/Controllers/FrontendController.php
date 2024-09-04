<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use App\Mail\ForgetPassword;
use App\Mail\LoginOtp;
use App\Models\Molecule;
use App\Models\Page;
use App\Models\Slider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    public $layout = 'front.layouts.home';

    public function index($slug)
    {
        if (Page::whereSlug($slug)->exists()) {
            $page = Page::whereSlug($slug)->first();
            //$this->layout = View::make('front.layouts.home');

            return response()->view('front.dynamic-pages', ['page' => $page,]);
        } else {
            abort(404);
        }

    }

    public function home(Request $request,)
    {
        if (Page::whereSlug('home')->exists()) {
            $page = Page::whereSlug('home')->first();
            //$this->layout = View::make('front.layouts.home');

            return response()->view('front.dynamic-pages', ['page' => $page,]);
        } else {
            abort(404);
        }
    }

    public function dashboard(Request $request,)
    {
        if (Auth::check()) {
            return response()->view('front.dashboard');
        } else {
            abort(403);
        }
    }


    public function showLogin(Request $request,)
    {
        if (!Auth::check()) {
            return response()->view('front.login');
        } else {
            return redirect('/dashboard');
        }
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'string|required|email',
            'password' => 'string|required'
        ]);

        $userCredential = $request->only('email', 'password');


        if (Auth::attempt($userCredential)) {

            //$route = $this->redirectDash();
            return redirect('/dashboard');
        } else {
            return back()->withErrors(['error' => 'Username & Password is incorrect']);
        }

    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }

    public function contactFrom(Request $request)
    {
        $request->validate([
            'email' => 'string|required|email',
            'full_name' => 'string|required',
            'subject' => 'string|required',
            'message' => 'string|required',
            'contact' => 'string|required',
        ]);
        try {
            $emailTo = [
                [
                    'email' => 'support@glycomicsworkbench.org',
                    'name' => 'Glycomics',
                ]
            ];
            if (Mail::to($emailTo)->send(new ContactForm($request['full_name'], $request['contact'], $request['message'], $request['email'], $request['subject']))) {
                return redirect('/contact')->with('status', 'Query sent successfully');
            }


        } catch (\Throwable $e) {
            return redirect('/contact')->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }


    }

    public function quickcontact(Request $request)
    {
        $request->validate([
            'email' => 'string|required|email',
            'fullname' => 'string|required',
            'message' => 'string|required',
        ]);

        $emailTo = [
            [
                'email' => 'support@glycomicsworkbench.org',
                'name' => 'Glycomics',
            ]
        ];
        if (Mail::to($emailTo)->send(new QuickContact($request['fullname'], $request['message'], $request['email']))) {
            return ['status' => true, 'msg' => 'Message Sent successfully'];
        }

    }

    public function showEmailVerification()
    {
        if (auth()->user() && !auth()->user()->hasVerifiedEmail()) {
            return view('front.verify-email');
        } else {
            abort(404);
        }

    }

    public function requestEmailVerification()
    {
        auth()->user()->sendEmailVerificationNotification();

        return back()
            ->with('success', 'Verification link sent!');
    }

    public function verifyEmailVerification(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->to('/dashboard')->with('success', 'Email Verified Successfully');; // <-- change this to whatever you want
    }

    public function registerForm(Request $request)
    {
        return $request->post();
        $request->validate([
            'user_first_name' => 'string|required|min:3',
            'user_middle_name' => 'string|nullable',
            'user_last_name' => 'string|required|min:3',
            'gender' => 'string',
            'email' => 'string|email|required|max:100|unique:users',
            'user_alt_email' => 'string|email|max:100|nullable',
            'user_password' => 'string|required|min:8',
        ]);

        try {
            $user = new User();
            $user->name = $request->user_first_name . ' ' . $request->user_middle_name . ' ' . $request->user_last_name;
            $user->gender = $request->gender;
            $user->user_title = $request->user_title;
            $user->education = $request->education;
            $user->address_line_1 = $request->address_line_1;
            $user->address_line_2 = $request->address_line_2;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->zipcode = $request->zipcode;
            $user->country = $request->country;
            $user->user_phone = $request->user_phone_withcode;
            $user->user_phone_for = $request->user_phone_for;
            $user->user_alt_phone = $request->user_altphone_withcode;
            $user->user_alt_phone_for = $request->user_alt_phone_for;
            $user->email = $request->email;
            $user->user_alt_email = $request->user_alt_email;
            $user->user_personal_website = $request->user_personal_website;
            $user->password = Hash::make($request->user_password);
            $user->otp_token = '';
            $user->user_organisation = $request->user_organisation;
            $user->user_job_title = $request->user_job_title;
            $user->user_department = $request->user_department;
            $user->user_company_website = $request->user_company_website;
            $user->user_studentof = $request->user_studentof;
            $user->user_studentof_type = $request->user_studentof_type;
            $user->user_alumniof = $request->user_alumniof;
            $user->user_alumniof_type = $request->user_alumniof_type;
            $user->user_degree = $request->user_degree;
            $user->user_major = $request->user_major;
            $user->user_year_pass = $request->user_year_pass;
            $user->save();
            $user->assignRole($request->user_role);
            event(new Registered($user));
            Auth::login($user);
            return redirect()->route('verification.notice');
        } catch (\Throwable $e) {
            return redirect()->route('frontregister', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function showForgetPasswordForm()
    {
        return view('front.forgot-password');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        $user = User::where('email', $request->email)->first();
        $user->reset_token = $token;
        $user->save();

        Mail::to($request->email)->send(new ForgetPassword($token));

        return back()->with('message', 'We have e-mailed you a password reset link!');
    }

    public function showResetPasswordForm($token)
    {
        return view('front.forgetPasswordLink', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $getUser = DB::table('users')
            ->where([
                'email' => $request->email,
                'reset_token' => $request->token
            ])
            ->first();
        if (!$getUser) {
            return back()->withInput()->with('message', 'Invalid token!');
        }
        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password), 'reset_token' => null]);

        return redirect('/login')->with('message', 'Your password has been changed!');
    }


}
