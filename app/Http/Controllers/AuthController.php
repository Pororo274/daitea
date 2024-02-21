<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signIn()
    {
        return view('pages.auth.login');
    }

    public function registration()
    {
        return view('pages.auth.sign-up');
    }

    public function signUp(SignUpRequest $request)
    {
        User::query()->create($request->all());

        return redirect()->route('auth.sign-in');
    }

    public function login(LoginRequest $request)
    {
        if (auth()->attempt($request->only(['email', 'password']))) {
            session()->regenerate();

            return redirect()->route('product.index');
        }

        return back()->withErrors([
            'login' => 'Такой пользователь не найден'
        ]);
    }

    public function exit()
    {
        auth()->logout();

        session()->regenerate();

        return redirect()->route('product.index');
    }
}
