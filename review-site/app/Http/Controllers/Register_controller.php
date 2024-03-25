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
        dd($request);
        $user = User::create($request->all());
        if ($user){
            Auth::login($user);
            return redirect()->route('main.index');
        }
        return redirect()->route('register.index')->withErrors(["formError" => "Произошла ошибка"]);
    }
}
