<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Mail\DemoEmail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use function Laravel\Prompts\password;

class Register_controller extends Controller
{

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('main/register');
    }

    public function store(RegisterRequest $request): \Illuminate\Http\RedirectResponse
    {
        $remember = $request->has('remember');
        $user = User::create($request->all());
        if ($user) {
            Auth::login($user, $remember);

            $objDemo = new \stdClass();
            $objDemo->title = 'Thanks for registration!';
            $objDemo->text = 'You have been successfully registered!';
            $objDemo->sender = 'laravel@no-reply';
            $objDemo->receiver = $request->email;
            Mail::to($request->email)->send(new DemoEmail($objDemo));

            return redirect()->route('main.index');
        }
        return redirect()->route('register.index')->withErrors(["formError" => "Something going wrong! Please try again!"]);
    }
}
