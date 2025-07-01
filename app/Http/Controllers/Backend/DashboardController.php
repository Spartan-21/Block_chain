<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Auth;
use App\Models\Batch;
use App\Models\Farm;        
use App\Models\User;        
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::count();
        if(in_array('admin', Auth::user()->roles->pluck('slug')->toArray())) {
            $batches = Batch::count();
            $farms = Farm::count();
        } else {
            $batches = Batch::whereHas('farm', function($query) {
                $query->where('user_id', Auth::user()->id);
            })->count();
            $farms = Farm::where('user_id', Auth::user()->id)->count();
        }
        return view('backend.dashboard', compact('users', 'batches', 'farms'));
    }
}