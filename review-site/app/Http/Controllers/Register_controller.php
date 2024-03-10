<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;

class Register_controller extends Controller
{

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('main/register');
    }

    public function store(RegisterRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->admin = false;
        $user->password = password_hash($request->password, PASSWORD_DEFAULT);
        $user->save();
        $user = User::where('username', $request->username)->first();
        session([
            'user' => $user->id,
            'username' => $user->username,
        ]);

       return redirect()->route('main.index');
    }
}
