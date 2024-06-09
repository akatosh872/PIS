<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('registration.form');
    }
    public function showLoginForm()
    {
        return view('login.form');
    }

    public function processRegistration(Request $request)
    {
        // Валідація даних
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // Збереження користувача в базу даних
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        auth()->login($user);

        // Перенаправлення на головну сторінку або іншу сторінку
        return redirect('/');
    }

    public function processLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            auth()->login($user);

            return redirect('/');
        }

        return back()->withErrors(['email' => 'Невірна електронна пошта або пароль']);
    }
}
