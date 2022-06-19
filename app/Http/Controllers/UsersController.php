<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Hash;
use Illuminate\Auth\Events\Registered;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index')
            ->with('users', User::paginate(10));
    }

    public function create()
    {
        return view('users.create')
            ->with('roles', Role::cases());
    }

    public function store(RegisterUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        event(new Registered($user));

        return redirect()
            ->route('users.show', $user);
    }

    public function show(User $user)
    {
        return view('users.show')
            ->with('user', $user);
    }
}
