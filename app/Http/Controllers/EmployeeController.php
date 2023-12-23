<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function showLoginForm()
    {
        return view('backend.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('employee')->attempt($credentials)) {
            return redirect()->intended('/backend');
        }

        return redirect('/backend/login')->with('error', 'Невірний email або пароль');
    }
}
