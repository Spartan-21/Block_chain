<?php

namespace App\Http\Controllers\Backend\AccessControl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('backend.access_control.users.index');
    }
    
    public function assign_roles()
    {
        return view('backend.access_control.users.assign-roles');
    }
    
    public function view()
    {
        return view('backend.access_control.users.view');
    }
}
