<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use App\Models\PasswordResetToken;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function login()
    {
        return view("auth.login", [
            'title' => 'Login',
        ]);
    }

    public function forgot_password()
    {
        return view("auth.forgot");
    }

    public function proses_forgot_password(Request $request)
    {
        $customMessage = [
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.exists' => 'Email tidak terdaftar',
        ];
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], $customMessage);

        $token = Str::random(60);
        PasswordResetToken::updateOrCreate(
            [
                'email' => $request->email
            ],
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => now(),
            ]
        );

        Mail::to($request->email)->send(new ResetPasswordMail($token));


        return redirect('/login')->with('success', 'Kami telah mengirimkan tautan atur ulang kata sandi ke email anda');
    }

    public function proses_validasi_forgot_password(Request $request)
    {
        $customMessage = [
            'password.required' => 'Kata Sandi tidak boleh kosong',

        ];
        $request->validate([
            'password' => 'required'
        ], $customMessage);

        $token = PasswordResetToken::where('token', $request->token)->first();

        if (!$token) {
            return redirect('/login')->with('error', 'Token tidak valid');
        }
        $user = User::where('email', $token->email)->first();
        if (!$user) {
            return redirect('/login')->with('error', 'Email tidak terdaftar');
        }
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        $token->delete();

        return redirect('/login')->with('success', 'Kata Sandi berhasil diatur ulang');
    }

    public function validasi_forgot_password(Request $request, $token)
    {
        $getToken = PasswordResetToken::where(['token' => $token])->first();

        if (!$getToken) {
            return redirect('/login')->with('failed', 'Token tidak valid');
        }

        return view("auth.validasi-token", compact('token'));
    }


    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            return redirect()->intended('/dashboard');
        }

        return back()->with('failed', 'Login gagal');
    }



    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda berhasil keluar!');
    }
}
