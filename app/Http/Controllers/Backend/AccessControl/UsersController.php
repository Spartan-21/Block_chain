<?php

namespace App\Http\Controllers\Backend\AccessControl;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::query()->get();
        return view('backend.access_control.users.index', compact('users'));
    }

    public function assign_roles(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);
        $roles = config('roles.models.role')::all();
        return view('backend.access_control.users.assign-roles', compact('user', 'roles'));
    }
    
    public function save_assigned_roles(Request $request, $user_id)
    {        
        $validated = $request->validate([
            'role_id' => 'required|string|exists:roles,id',
        ]);
        $user = User::findOrFail($user_id);
        $role = config('roles.models.role')::where('id', '=', $validated['role_id'])->first();
        $user->attachRole($role);
        return redirect()->route('users')->with('success', 'Role assigned to user successfully!');
    }
    
    public function view()
    {
        return view('backend.access_control.users.view');
    }

    public function destroy(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();
        return redirect()->route('users')->with('success', 'User deleted successfully!');
    }
}
