<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Auth_controller extends Controller
{

    public function logout()
    {
        session()->flush();
        return redirect()->route('main');
    }

    public function submit(AuthRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = User::where('username', $request['username'])->first();

        if (!$user) {
            return back()->withErrors([
                'username' => 'wrong username.',
            ])->withInput();
        }
        if (password_verify($request->password, $user->password)){
            if ($user->admin === 1){
                session([
                    'user' => $request->username,
                    'isAdmin' => $user->admin,
                ]);
            }
            else
                session([
                    'user' => $request->username,
                ]);
        } else {
            return back()->withErrors([
                'password' => 'wrong password.',
            ])->withInput();
        }
        return redirect()->route('main');
    }
}
