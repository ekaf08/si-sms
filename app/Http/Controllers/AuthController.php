<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Captcha;
use App\Http\Controllers\captcha_img;

class AuthController extends Controller
{
    public function login()
    {
        if (!empty(Auth::check())) {
            if (Auth::user()->user_type == 1) {
                return redirect('/admin/dashboard');
            } elseif (Auth::user()->user_type == 2) {
                return redirect('/student/dashboard');
            } elseif (Auth::user()->user_type == 3) {
                return redirect('/teacher/dashboard');
            } elseif (Auth::user()->user_type == 4) {
                return redirect('/parent/dashboard');
            }
        }
        return view('auth.login');
    }

    public function authLogin(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
                'captcha' => 'required|captcha'
            ],
            ['captcha.captcha' => 'Invalid captcha code.']
        );
        $remember = !empty($request->remember) ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            if (Auth::user()->user_type == 1) {
                return redirect('/admin/dashboard');
            } elseif (Auth::user()->user_type == 2) {
                return redirect('/student/dashboard');
            } elseif (Auth::user()->user_type == 3) {
                return redirect('/teacher/dashboard');
            } elseif (Auth::user()->user_type == 4) {
                return redirect('/parent/dashboard');
            }
        } else {
            return redirect()->back()->with('error', 'Username atau Password tidak sesuai.');
        }
    }

    public function refresh_captcha()
    {
        $captcha = Captcha::img();
        return response()->json(['captcha' => $captcha]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function forgotpassword()
    {
        $data['header_title'] = "Lupa Password";

        return view('auth.forgot', $data);
    }

    public function postforgot(Request $request)
    {
        $user = User::getEmailSingle($request->email);
        if (!empty($user)) {
            $user->remember_token = Str::random(30);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success', 'Silahkan cek email anda untuk mereset password.');
        } else {
            return redirect()->back()->with('error', 'Mohon maaf email tidak di temukan di database.');
        }
    }

    public function reset($token)
    {
        $user = User::getTokenSingle($token);
        if (!empty($user)) {
            $data['user'] = $user;
            $data['token'] = $token;
            return view('auth.reset', $data);
        } else {
            abort(404);
        }
    }

    public function postreset($token, Request $request)
    {
        if ($request->password == $request->confirm_password) {
            $user = User::getTokenSingle($token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();

            return redirect('/')->with('success', 'Password berhasil di reset.');
        } else {
            return redirect()->back()->with('error', 'Mohon maaf password dan konfirmasi password tidak sesuai.');
        }
    }
}
