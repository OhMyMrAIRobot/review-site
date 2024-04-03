<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Auth_controller extends Controller
{

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('main/auth');
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        return redirect()->route('main.index');
    }

    public function login(AuthRequest $request): \Illuminate\Http\RedirectResponse
    {
        $remember = $request->has('remember');
        $data = $request->only(['username', 'password']);
        if(Auth::attempt($data, $remember)) {
            return redirect()->route('main.index');
        }
        else {
            return redirect()->back()->withErrors([
                'username' => '* Неверный логин или пароль',
            ])->withInput();
        }
    }
}
