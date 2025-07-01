<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QualityController extends Controller
{
    public function create($batchId)
    {
        return view('quality.quality-form', compact('batchId'));
    }

    public function store(Request $request)
    {
        // Web3 logic goes here
        return back()->with('success', 'Quality test recorded.');
    }
}
