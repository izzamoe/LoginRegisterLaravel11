<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class AuthControllers extends Controller
{

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard.home');
        }

        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.',
        ]);
    }

    //
    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:1',
        ], [
            'name.required' => 'Nama diperlukan.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'email.required' => 'Email diperlukan.',
            'email.email' => 'Email harus valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password diperlukan.',
            'password.confirmed' => 'Password dan konfirmasi password harus cocok.',
            'password.min' => 'Password harus setidaknya 1 karakter.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard.home');

    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('auth.login');
    }

    public function CheckLogin(): RedirectResponse
    {
        return auth()->check() ? redirect()->route('dashboard.home') : redirect()->route('auth.login');
    }
//    register
//    login
    public function RegisterPage(): View
    {
        return view('register');
    }

    public function LoginPage(): View
    {
        return view('login');
    }
}
