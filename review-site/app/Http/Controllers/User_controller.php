<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class User_controller extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::paginate(10);
        $users->withPath('/admin/users');
        return view('admin/users.adminUsers', ['users' => $users]);
    }

    public function getUsersBySearch(\Illuminate\Http\Request $request)
    {
        $users = User::where('username', 'like', '%' . $request->search . '%')
            ->orWhere('email', 'like', '%' . $request->search . '%')->orderBy('created_at', 'desc')->paginate(10);
        $users->withPath('?search=' . $request->search);
        return view('admin/users.adminUsers', ['users' => $users]);
    }

    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::find($id);
        return view('admin/users.editUser', ['user' => $user]);
    }

    public function update(EditUserRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $user = User::find($id);
        $user->update([
                'admin' => $request->has('admin'),
                'username' => $request->username,
                'email' => $request->email,
                'password' => $request->password ? password_hash($request->password, PASSWORD_DEFAULT) : $user->password,
            ]
        );
        return redirect()->route('users.index')->with('status_ok', 'User updated successfully.');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('status_ok', 'User deleted successfully');
    }
}
