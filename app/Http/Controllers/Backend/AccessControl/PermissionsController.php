<?php

namespace App\Http\Controllers\Backend\AccessControl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    public function index()
    {
        $permissions = config('roles.models.permission')::with(['roles', 'users'])->get();
        return view('backend.access_control.permissions.index', compact('permissions'));
    }
}
