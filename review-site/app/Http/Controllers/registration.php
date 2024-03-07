<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class registration extends Controller{

    public function main()
    {
        return 123;
    }
    public function submit(RegisterRequest $registerRequest): \Illuminate\Http\RedirectResponse
    {
        dd($registerRequest);
        $user = new User();

        $user->username = $registerRequest->username;
        $user->email = $registerRequest->email;
        $user->admin = false;
        $user->password = Hash::make($registerRequest->password);
        $user->save();

        return redirect()->route('main');
    }
}
