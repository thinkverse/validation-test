<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use Illuminate\View\View;

class ViewRolesController extends Controller
{
    public function __invoke(): View
    {
        return view('roles.index')->with('roles', Role::cases());
    }
}
