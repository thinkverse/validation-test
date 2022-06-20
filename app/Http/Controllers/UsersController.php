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
        $this->authorize('viewAny', User::class);

        return view('users.index')
            ->with('users', User::paginate(10));
    }

    public function create()
    {
        $this->authorize('create', User::class);

        return view('users.create')
            ->with('roles', Role::cases());
    }

    public function store(RegisterUserRequest $request)
    {
        $this->authorize('create', User::class);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
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
        $this->authorize('view', [User::class, $user]);

        return view('users.show')
            ->with('user', $user);
    }
}
