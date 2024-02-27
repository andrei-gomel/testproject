<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ["required", "email", "string"],
            'password' => ["required"],
        ]);

        if (auth('web')->attempt($data))
        {
            return redirect(route('show'));
        }
        else
        {
            return view('auth.login');
        }
    }

    public function logout()
    {
        auth('web')->logout();

        return redirect(route('show'));
    }
}
