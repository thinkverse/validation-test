<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserProfileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function __invoke(User $user)
    {
        $this->authorize('view', [User::class, $user]);

        return view('users.profile')
            ->with('user', $user);
    }
}
