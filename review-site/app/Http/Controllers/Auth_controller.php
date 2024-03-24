<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Auth_controller extends Controller
{

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('main/auth');
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        session()->flush();
        return redirect()->route('main.index');
    }

    public function check(AuthRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = User::where('username', $request['username'])->first();

        if (!$user) {
            return redirect()->back()->withErrors([
                'username' => '* Такого пользователя не существует',
            ])->withInput();
        }
        if (password_verify($request->password, $user->password)){
            if ($user->admin === 1){
                session([
                    'user' => $user->id,
                    'username' => $user->username,
                    'isAdmin' => $user->admin,
                ]);
            }
            else
                session([
                    'user' => $user->id,
                    'username' => $user->username,
                ]);
        } else {
            return redirect()->back()->withErrors([
                'password' => '* Пароль неверный',
            ])->withInput();
        }
        return redirect()->route('main.index');
    }
}
