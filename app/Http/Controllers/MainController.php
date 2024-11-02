<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class MainController extends Controller
{
    public function index()
    {
        $users=User::all();
        $roles=Role::all();
        $permissions=Permission::all();
        $projects=Project::all();
        return view('dashboard', compact('users','roles','permissions','projects'));
    }
}
