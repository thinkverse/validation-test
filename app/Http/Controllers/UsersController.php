<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        return 'store';
    }
}
