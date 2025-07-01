<?php

namespace App\Http\Controllers\Backend\AccessControl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $roles = config('roles.models.role')::with(['users', 'permissions'])->get();
        return view('backend.access_control.roles.index', compact('roles'));
    }
    
    public function create()
    {
        return view('backend.access_control.roles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:roles|max:40',
            'description' => 'nullable|string|max:191',
        ]);

        $newRole = config('roles.models.role')::create([
            'name'          => $validated['name'],
            'slug'          => str_slug($validated['name'], '.'),
            'description'   => $validated['description'],
            'level'         => 0,
        ]);
        foreach ($data["permissions"] as $permission_id) {
            $permission = config('roles.models.permission')::where('id', '=', $permission_id)->first();
            $newRole->attachPermission($permission);
        };

        return redirect()->route('roles')->with('success', 'Role created successfully!');
    }
    
    public function edit()
    {
        return view('backend.access_control.roles.edit');
    }
    
    public function view()
    {
        return view('backend.access_control.roles.view');
    }
    
    public function destroy(Request $request, $role_id)
    {
        $role = config('roles.models.role')::find($role_id);
        $role->detachAllPermissions();
        $role->delete();
        return redirect()->route('roles')->with('success', 'Role deleted successfully!');
    }
}
