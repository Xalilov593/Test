<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users=User::with('roles')->get();
        return view('users.index',compact('users'));
    }
    public function create()
    {
        $roles=Role::all();
        $permissions=Permission::all();
        return view('users.create',compact('roles','permissions'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8',
            'role_id' => 'required|exists:roles,id',

        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::findById($request->input('role_id'));
        $user->assignRole($role);
        return redirect()->route('users.index');
    }
    public function edit($id)
    {
        $user=User::findOrFail($id);
        $roles=Role::all();
        $permissions=Permission::all();
        return view('users.edit',compact('user','roles','permissions'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|min:8',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        $role = Role::findById($request->input('role_id'));
        $user->syncRoles($role);

        return redirect()->route('users.index');
    }
    public function destroy($id)
    {
        $user=User::destroy($id);
        return redirect()->route('users.index');
    }

}
