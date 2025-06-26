<?php

namespace App\Http\Controllers\Backend\AccessControl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        return view('backend.access_control.roles.index');
    }
    
    public function create()
    {
        return view('backend.access_control.roles.create');
    }
    
    public function edit()
    {
        return view('backend.access_control.roles.edit');
    }
    
    public function view()
    {
        return view('backend.access_control.roles.view');
    }
}
